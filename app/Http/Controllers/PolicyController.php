<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyGroup;
use App\Models\PolicyGroupMember;
use App\Models\PolicyMember;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function createPolicy(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "name" => "required | max:255",
            "priority" => "required",
            "description" => "required",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policy = new Policy();

        $policy->Name = $request->name;
        $policy->Priority = $request->priority;
        $policy->Description = $request->description;
        $policy->Disabled = $request->disabled;

        if ($policy->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policy]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }
    
    public function updatePolicy(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "name" => "required | max:255",
            "priority" => "required",
            "description" => "required",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policy = Policy::find($id);
        $policy->Name = $request->name;
        $policy->Priority = $request->priority;
        $policy->Description = $request->description;
        $policy->Disabled = $request->disabled;

        if ($policy->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policy]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }
    
    public function deletePolicy(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = Policy::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }


    public function createPolicyGroup(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "name" => "required | max:255",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyGroup =  new PolicyGroup();
        $policyGroup->Name = $request->name;
        $policyGroup->Comment = $request->comment;
        $policyGroup->Disabled = $request->disabled;

        if ($policyGroup->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyGroup]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updatePolicyGroup(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "name" => "required | max:255",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyGroup = PolicyGroup::find($id);
        $policyGroup->Name = $request->name;
        $policyGroup->Comment = $request->comment;
        $policyGroup->Disabled = $request->disabled;

        if ($policyGroup->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyGroup]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deletePolicyGroup(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = PolicyGroup::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function createPolicyMember(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "source" => "required",
            "destination" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyMember =  new PolicyMember();
        $policyMember->PolicyID = $request->policy_id;
        $policyMember->Source = $request->source;
        $policyMember->Destination = $request->destination;
        $policyMember->Comment = $request->comment;
        $policyMember->Disabled = $request->disabled;

        if ($policyMember->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updatePolicyMember(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "source" => "required",
            "destination" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);

        $policyMember = PolicyMember::find($id);
        $policyMember->PolicyID = $request->policy_id;
        $policyMember->Source = $request->source;
        $policyMember->Destination = $request->destination;
        $policyMember->Comment = $request->comment;
        $policyMember->Disabled = $request->disabled;

        if ($policyMember->save()) {
            return response()->json(["code" => 200, "message" => "updated", "data" => $policyMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deletePolicyMember(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = PolicyMember::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function createPolicyGroupMember(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_group_id" => "required",
            "member" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);
        $policyGroupMember =  new PolicyGroupMember();
        $policyGroupMember->PolicyGroupID = $request->policy_group_id;
        $policyGroupMember->Member = $request->member;
        $policyGroupMember->Comment = $request->comment;
        $policyGroupMember->Disabled = $request->disabled;

        if ($policyGroupMember->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyGroupMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function updatePolicyGroupMember(Request $request,string $id): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_group_id" => "required",
            "member" => "required",
            "comment" => "required | max:1024",
            "disabled" => "required | integer|min:0|digits_between: 0,1",
        ]);
        $policyGroupMember =  PolicyGroupMember::find($id);
        $policyGroupMember->PolicyGroupID = $request->policy_group_id;
        $policyGroupMember->Member = $request->member;
        $policyGroupMember->Comment = $request->comment;
        $policyGroupMember->Disabled = $request->disabled;

        if ($policyGroupMember->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $policyGroupMember]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }

    public function deletePolicyGroupMember(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = PolicyGroupMember::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

}
