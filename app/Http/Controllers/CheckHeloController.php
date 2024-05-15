<?php

namespace App\Http\Controllers;


use App\Models\CheckHelo;
use App\Models\CheckHeloBlackList;
use App\Models\CheckHeloTracking;
use App\Models\CheckHeloWhiteList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckHeloController extends Controller
{
    public function indexHelo()
    {
        $acs = CheckHelo::all();

        return response()->json($acs);
    }

    public function indexBlackList(): JsonResponse
    {
        $acs = CheckHeloBlackList::all();

        return response()->json($acs);
    }

    public function createBlackList(Request $request): JsonResponse
    {
        $validation = $request->validate([
            "helo" => "required | max:255",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkBlackList = new CheckHeloBlackList();
        $checkBlackList->Helo = $request->helo;
        $checkBlackList->Comment = $request->comment;
        $checkBlackList->Disabled = $request->disabled;

        if ($checkBlackList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $checkBlackList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteBlackList(Request $request, string $id): JsonResponse
    {
        $result = CheckHeloBlackList::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function updateBlackList(Request $request, string $id): JsonResponse
    {
        $validation = $request->validate([
            "helo" => "required | max:255",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkBlackListUpdate = CheckHeloBlackList::find($id);
        $checkBlackListUpdate->Helo = $request->helo;
        $checkBlackListUpdate->Comment = $request->comment;
        $checkBlackListUpdate->Disabled = $request->disabled;
        $checkBlackListUpdate->save();
        return response()->json(["code" => 200, "message" => "updated", "data" => $validation]);
    }
    public function indexWhiteList(): JsonResponse
    {
        $acs = CheckHeloWhiteList::all();

        return response()->json($acs);
    }

    public function createWhiteList(Request $request): JsonResponse
    {
        $validation = $request->validate([
            "source" => "required | max:512",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkWhiteList = new CheckHeloWhiteList();
        $checkWhiteList->Source = "SenderIP:".$request->source;
        $checkWhiteList->Comment = $request->comment;
        $checkWhiteList->Disabled = $request->disabled;

        if ($checkWhiteList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $checkWhiteList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteWhiteList(Request $request, string $id): JsonResponse
    {
        $result = CheckHeloWhiteList::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function updateWhiteList(Request $request, string $id): JsonResponse
    {
        $validation = $request->validate([
            "source" => "required | max:512",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $checkWhiteListUpdate = CheckHeloWhiteList::find($id);
        $checkWhiteListUpdate->Source = "SenderIP:".$request->source;
        $checkWhiteListUpdate->Comment = $request->comment;
        $checkWhiteListUpdate->Disabled = $request->disabled;
        $checkWhiteListUpdate->save();
        return response()->json(["code" => 200, "message" => "updated", "data" => $validation]);
    }

    public function createTracking(Request $request): JsonResponse
    {
        $validation = $request->validate([
            "address" => "required | max:64",
            "helo" => "required | max:255",
            "last_update" => "required",
        ]);

        $checkTracking = new CheckHeloTracking();
        $checkTracking->Address = "SenderIP:".$request->address;
        $checkTracking->Helo = $request->helo;
        $checkTracking->LastUpdate = $request->last_update;

        if ($checkTracking->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $checkTracking]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteTracking(Request $request, string $id): JsonResponse
    {
        $result = CheckHeloTracking::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function updateTracking(Request $request, string $id): JsonResponse
    {
        $validation = $request->validate([
            "address" => "required | max:64",
            "helo" => "required | max:255",
            "last_update" => "required | integer",
        ]);

        $checkTracking =  CheckHeloTracking::find($id);
        $checkTracking->Address = "SenderIP:".$request->address;
        $checkTracking->Helo = $request->helo;
        $checkTracking->LastUpdate = $request->last_update;

        if ($checkTracking->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $checkTracking]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }
}
