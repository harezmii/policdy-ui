<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use App\Models\AccountingTracking;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function createAccounting(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "track" => "required",
            "accounting_period" => "required",
            "message_count_limit" => "required",
            "message_cumulative_size_limit" => "required",
            "verdict" => "required",
            "data" => "required",
            "last_accounting" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $accounting =  new Accounting();
        $accounting->PolicyID = $request->policy_id;
        $accounting->Name = $request->name;
        $accounting->Track = $request->Track;
        $accounting->AccountingPeriod = $request->accounting_period;
        $accounting->MessageCountLimit = $request->message_count_limit;
        $accounting->MessageCumulativeSizeLimit = $request->message_cumulative_size_limit;
        $accounting->Verdict = $request->verdict;
        $accounting->Data = $request->data;
        $accounting->LastAccounting = $request->last_accounting;
        $accounting->Comment = $request->comment;
        $accounting->Disabled = $request->disabled;

        if ($accounting->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $accounting]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateAccounting(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "track" => "required",
            "accounting_period" => "required",
            "message_count_limit" => "required",
            "message_cumulative_size_limit" => "required",
            "verdict" => "required",
            "data" => "required",
            "last_accounting" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);


        $accounting = Accounting::find($id);
        $accounting->PolicyID = $request->policy_id;
        $accounting->Name = $request->name;
        $accounting->Track = $request->Track;
        $accounting->AccountingPeriod = $request->accounting_period;
        $accounting->MessageCountLimit = $request->message_count_limit;
        $accounting->MessageCumulativeSizeLimit = $request->message_cumulative_size_limit;
        $accounting->Verdict = $request->verdict;
        $accounting->Data = $request->data;
        $accounting->LastAccounting = $request->last_accounting;
        $accounting->Comment = $request->comment;
        $accounting->Disabled = $request->disabled;

        if ($accounting->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $accounting]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deleteAccounting(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $result = Accounting::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }


    public function createAccountingTracking(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "accounting_id" => "required",
            "track_key" => "required",
            "period_key" => "required",
            "last_update" => "required",
            "message_count" => "required",
            "message_cumulative_size" => "required",
        ]);


        $accountingTracking =  new AccountingTracking();
        $accountingTracking->AccountingID = $request->accounting_id;
        $accountingTracking->TrackKey = $request->track_key;
        $accountingTracking->PeriodKey = $request->period_key;
        $accountingTracking->LastUpdate = $request->last_update;
        $accountingTracking->MessageCount = $request->message_count;
        $accountingTracking->MessageCumulativeSize = $request->message_cumulative_size;

        if ($accountingTracking->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $accountingTracking]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateAccountingTracking(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "accounting_id" => "required",
            "track_key" => "required",
            "period_key" => "required",
            "last_update" => "required",
            "message_count" => "required",
            "message_cumulative_size" => "required",
        ]);



        $accountingTracking =  AccountingTracking::find($id);
        $accountingTracking->AccountingID = $request->accounting_id;
        $accountingTracking->TrackKey = $request->track_key;
        $accountingTracking->PeriodKey = $request->period_key;
        $accountingTracking->LastUpdate = $request->last_update;
        $accountingTracking->MessageCount = $request->message_count;
        $accountingTracking->MessageCumulativeSize = $request->message_cumulative_size;

        if ($accountingTracking->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $accountingTracking]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deleteAccountingTracking(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $result = AccountingTracking::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }
}
