<?php

namespace App\Http\Controllers;

use App\Models\Quatas;
use App\Models\QuatasLimit;
use Illuminate\Http\Request;

class QuotasController extends Controller
{

    public function createQuotas(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "track" => "required",
            "period" => "required",
            "verdict" => "required",
            "data" => "required",
            "last_quota" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $quotas = new Quatas();
        $quotas->PolicyID = $request->policy_id;
        $quotas->Name = $request->name;
        $quotas->Track = $request->track;
        $quotas->Period = $request->period;
        $quotas->Verdict = $request->verdict;
        $quotas->Data = $request->data;
        $quotas->LastQuota = $request->last_quota;
        $quotas->Comment = $request->comment;
        $quotas->Disabled = $request->disabled;

        if ($quotas->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $quotas]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteQuotas(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = Quatas::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);

    }

    public function updateQuotas(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "track" => "required",
            "period" => "required",
            "verdict" => "required",
            "data" => "required",
            "last_quota" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $quotas =  Quatas::find($id);
        $quotas->PolicyID = $request->policy_id;
        $quotas->Name = $request->name;
        $quotas->Track = $request->track;
        $quotas->Period = $request->period;
        $quotas->Verdict = $request->verdict;
        $quotas->Data = $request->data;
        $quotas->LastQuota = $request->last_quota;
        $quotas->Comment = $request->comment;
        $quotas->Disabled = $request->disabled;

        if ($quotas->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $quotas]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }


    public function createQuotasLimit(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "quotas_id" => "required",
            "type" => "required",
            "counter_limit" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $quotasLimit = new QuatasLimit();
        $quotasLimit->QuotasID = $request->quotas_id;
        $quotasLimit->Type = $request->type;
        $quotasLimit->CounterLimit = $request->counter_limit;
        $quotasLimit->Comment = $request->comment;
        $quotasLimit->Disabled = $request->disabled;

        if ($quotasLimit->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $quotasLimit]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteQuotasLimit(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = QuatasLimit::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);

    }

    public function updateQuotasLimit(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "quotas_id" => "required",
            "type" => "required",
            "counter_limit" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $quotasLimit =  QuatasLimit::find($id);
        $quotasLimit->QuotasID = $request->quotas_id;
        $quotasLimit->Type = $request->type;
        $quotasLimit->CounterLimit = $request->counter_limit;
        $quotasLimit->Comment = $request->comment;
        $quotasLimit->Disabled = $request->disabled;

        if ($quotasLimit->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $quotasLimit]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }
}
