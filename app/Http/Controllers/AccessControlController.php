<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;

class AccessControlController extends Controller
{
    public function createAccessControl(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "verdict" => "required",
            "data" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyMember =  new Access();
        $policyMember->PolicyID = $request->policy_id;
        $policyMember->Name = $request->name;
        $policyMember->Verdict = $request->verdict;
        $policyMember->Data = $request->data;
        $policyMember->Comment = $request->comment;
        $policyMember->Disabled = $request->disabled;

        if ($policyMember->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateAccessControl(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "verdict" => "required",
            "data" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyMember = Access::find($id);
        $policyMember->PolicyID = $request->policy_id;
        $policyMember->Name = $request->name;
        $policyMember->Verdict = $request->verdict;
        $policyMember->Data = $request->data;
        $policyMember->Comment = $request->comment;
        $policyMember->Disabled = $request->disabled;

        if ($policyMember->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $policyMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deleteAccessControl(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $result = Access::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }
}
