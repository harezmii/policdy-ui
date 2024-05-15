<?php

namespace App\Http\Controllers;

use App\Models\Greylisting;
use App\Models\GreylistingAutoBlackList;
use App\Models\GreylistingAutoWhiteList;
use App\Models\GreylistingTracking;
use App\Models\GreyListingWhiteList;
use Illuminate\Http\Request;

class GreyListingController extends Controller
{
    public function createGreyListing(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "use_grey_listing" => "required",
            "grey_list_period" => "required",
            "track" => "required",
            "grey_list_auth_validity" => "required",
            "grey_list_un_auth_validity" => "required",
            "use_auto_white_list" => "required",
            "auto_white_list_period" => "required",
            "auto_white_list_count" => "required",
            "auto_white_list_percentage" => "required",
            "use_auto_black_list" => "required",
            "auto_black_list_period" => "required",
            "auto_black_list_count" => "required",
            "auto_black_list_percentage" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $greyListing =  new Greylisting();
        $greyListing->PolicyID = $request->policy_id;
        $greyListing->Name = $request->name;
        $greyListing->UseGreylisting = $request->use_grey_listing;
        $greyListing->GreylistPeriod = $request->grey_list_period;
        $greyListing->Track = $request->track;
        $greyListing->GreylistAuthValidity = $request->grey_list_auth_validity;
        $greyListing->GreylistUnAuthValidity = $request->grey_list_un_auth_validity;
        $greyListing->UseAutoWhitelist = $request->use_auto_white_list;
        $greyListing->AutoWhitelistPeriod = $request->auto_white_list_period;
        $greyListing->AutoWhitelistCount = $request->auto_white_list_count;
        $greyListing->AutoWhitelistPercentage = $request->auto_white_list_percentage;
        $greyListing->UseAutoBlacklist = $request->use_auto_black_list;
        $greyListing->AutoBlacklistPeriod = $request->auto_black_list_period;
        $greyListing->AutoBlacklistCount = $request->auto_black_list_count;
        $greyListing->AutoBlacklistPercentage = $request->auto_black_list_percentage;
        $greyListing->Comment = $request->comment;
        $greyListing->Disabled = $request->disabled;

        if ($greyListing->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $greyListing]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateGreyListing(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "use_grey_listing" => "required",
            "grey_list_period" => "required",
            "track" => "required",
            "grey_list_auth_validity" => "required",
            "grey_list_un_auth_validity" => "required",
            "use_auto_white_list" => "required",
            "auto_white_list_period" => "required",
            "auto_white_list_count" => "required",
            "auto_white_list_percentage" => "required",
            "use_auto_black_list" => "required",
            "auto_black_list_period" => "required",
            "auto_black_list_count" => "required",
            "auto_black_list_percentage" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $greyListing =  Greylisting::find($id);
        $greyListing->PolicyID = $request->policy_id;
        $greyListing->Name = $request->name;
        $greyListing->UseGreylisting = $request->use_grey_listing;
        $greyListing->GreylistPeriod = $request->grey_list_period;
        $greyListing->Track = $request->track;
        $greyListing->GreylistAuthValidity = $request->grey_list_auth_validity;
        $greyListing->GreylistUnAuthValidity = $request->grey_list_un_auth_validity;
        $greyListing->UseAutoWhitelist = $request->use_auto_white_list;
        $greyListing->AutoWhitelistPeriod = $request->auto_white_list_period;
        $greyListing->AutoWhitelistCount = $request->auto_white_list_count;
        $greyListing->AutoWhitelistPercentage = $request->auto_white_list_percentage;
        $greyListing->UseAutoBlacklist = $request->use_auto_black_list;
        $greyListing->AutoBlacklistPeriod = $request->auto_black_list_period;
        $greyListing->AutoBlacklistCount = $request->auto_black_list_count;
        $greyListing->AutoBlacklistPercentage = $request->auto_black_list_percentage;
        $greyListing->Comment = $request->comment;
        $greyListing->Disabled = $request->disabled;

        if ($greyListing->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $greyListing]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }



    public function deleteGreyListing(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = Greylisting::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function createGreyListingWhiteList(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "source" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $greyListingWhiteList =  new GreyListingWhiteList();
        $greyListingWhiteList->Source = $request->source;
        $greyListingWhiteList->Comment = $request->comment;
        $greyListingWhiteList->Disabled = $request->disabled;

        if ($greyListingWhiteList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $greyListingWhiteList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateGreyListingWhiteList(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "source" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $greyListingWhiteList =  GreyListingWhiteList::find($id);
        $greyListingWhiteList->Source = $request->source;
        $greyListingWhiteList->Comment = $request->comment;
        $greyListingWhiteList->Disabled = $request->disabled;

        if ($greyListingWhiteList->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $greyListingWhiteList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }



    public function deleteGreyListingWhiteList(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = GreyListingWhiteList::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }


    public function createGreyListingAutoWhiteList(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required | max:512",
            "added" => "required",
            "last_seen" => "required",
            "comment" => "required | max:1024",
        ]);

        $greyListingAutoWhiteList =  new GreylistingAutoWhiteList();
        $greyListingAutoWhiteList->TrackKey = $request->track_key;
        $greyListingAutoWhiteList->Added = $request->added;
        $greyListingAutoWhiteList->LastSeen = $request->last_seen;
        $greyListingAutoWhiteList->Comment = $request->comment;

        if ($greyListingAutoWhiteList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $greyListingAutoWhiteList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateGreyListingAutoWhiteList(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required | max:512",
            "added" => "required",
            "last_seen" => "required",
            "comment" => "required | max:1024",
        ]);

        $greyListingAutoWhiteList =  GreylistingAutoWhiteList::find($id);
        $greyListingAutoWhiteList->TrackKey = $request->track_key;
        $greyListingAutoWhiteList->Added = $request->added;
        $greyListingAutoWhiteList->LastSeen = $request->last_seen;
        $greyListingAutoWhiteList->Comment = $request->comment;

        if ($greyListingAutoWhiteList->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $greyListingAutoWhiteList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }



    public function deleteGreyListingAutoWhiteList(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = GreylistingAutoWhiteList::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function createGreyListingAutoBlackList(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required | max:512",
            "added" => "required",
            "comment" => "required | max:1024",
        ]);

        $greyListingAutoBlackList =  new GreylistingAutoBlackList();
        $greyListingAutoBlackList->TrackKey = $request->track_key;
        $greyListingAutoBlackList->Added = $request->added;
        $greyListingAutoBlackList->Comment = $request->comment;

        if ($greyListingAutoBlackList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $greyListingAutoBlackList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateGreyListingAutoBlackList(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required | max:512",
            "added" => "required",
            "comment" => "required | max:1024",
        ]);

        $greyListingAutoBlackList =  GreylistingAutoBlackList::find($id);
        $greyListingAutoBlackList->TrackKey = $request->track_key;
        $greyListingAutoBlackList->Added = $request->added;
        $greyListingAutoBlackList->Comment = $request->comment;

        if ($greyListingAutoBlackList->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $greyListingAutoBlackList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }



    public function deleteGreyListingAutoBlackList(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = GreylistingAutoBlackList::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }


    public function createGreyListingTrackingList(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required",
            "sender" => "required",
            "recipient" => "required",
            "first_seen" => "required",
            "last_update" => "required",
            "tries" => "required",
            "count" => "required",
        ]);

        $greyListingTrackingList =  new GreylistingTracking();
        $greyListingTrackingList->TrackKey = $request->track_key;
        $greyListingTrackingList->Sender = $request->sender;
        $greyListingTrackingList->Recipient = $request->recipient;
        $greyListingTrackingList->FirstSeen = $request->first_seen;
        $greyListingTrackingList->LastUpdate = $request->last_update;
        $greyListingTrackingList->Tries = $request->tries;
        $greyListingTrackingList->Count = $request->count;

        if ($greyListingTrackingList->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $greyListingTrackingList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updateGreyListingTrackingList(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "track_key" => "required",
            "sender" => "required",
            "recipient" => "required",
            "first_seen" => "required",
            "last_update" => "required",
            "tries" => "required",
            "count" => "required",
        ]);

        $greyListingTrackingList =  GreylistingTracking::find($id);
        $greyListingTrackingList->TrackKey = $request->track_key;
        $greyListingTrackingList->Sender = $request->sender;
        $greyListingTrackingList->Recipient = $request->recipient;
        $greyListingTrackingList->FirstSeen = $request->first_seen;
        $greyListingTrackingList->LastUpdate = $request->last_update;
        $greyListingTrackingList->Tries = $request->tries;
        $greyListingTrackingList->Count = $request->count;

        if ($greyListingTrackingList->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $greyListingTrackingList]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deleteGreyListingTrackingList(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = GreylistingTracking::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }
}
