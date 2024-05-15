<?php

namespace App\Http\Controllers;

use App\Models\CheckHeloBlackList;
use App\Models\CheckSpf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckSpfController extends Controller
{

    public function createSpf(Request $request): JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required | integer",
            "name" => "required | max:255",
            "useSpf" => "required | integer",
            "rejectFailedSpf" => "required | integer",
            "addSpfHeader" => "required | integer",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkSpf = new CheckSpf();
        $checkSpf->PolicyID = $request->policy_id;
        $checkSpf->Name = $request->name;
        $checkSpf->UseSPF = $request->useSpf;
        $checkSpf->RejectFailedSPF = $request->rejectFailedSpf;
        $checkSpf->AddSPFHeader = $request->addSpfHeader;
        $checkSpf->Comment = $request->comment;
        $checkSpf->Disabled = $request->disabled;

        if ($checkSpf->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $validation]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteSpf(Request $request, string $id): JsonResponse
    {
        $result = CheckSpf::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function updateSpf(Request $request, string $id): JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required | integer",
            "name" => "required | max:255",
            "useSpf" => "required | integer",
            "rejectFailedSpf" => "required | integer",
            "addSpfHeader" => "required | integer",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkSpf = CheckSpf::find($id);
        $checkSpf->PolicyID = $request->policy_id;
        $checkSpf->Name = $request->name;
        $checkSpf->UseSPF = $request->useSpf;
        $checkSpf->RejectFailedSPF = $request->rejectFailedSpf;
        $checkSpf->AddSPFHeader = $request->addSpfHeader;
        $checkSpf->Comment = $request->comment;
        $checkSpf->Disabled = $request->disabled;
        $checkSpf->save();

        return response()->json(["code" => 200, "message" => "updated", "data" => $validation]);
    }
}
