<?php

namespace App\Http\Controllers;

use App\Models\AmavisRules;
use Illuminate\Http\Request;

class AmavisRulesController extends Controller
{
    public function createAmavisRules(Request $request): \Illuminate\Http\JsonResponse
    {
        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "bypass_virus_checks" => "required",
            "bypass_virus_checks_m" => "required",
            "bypass_banned_checks" => "required",
            "bypass_banned_checks_m" => "required",
            "bypass_spam_checks" => "required",
            "bypass_spam_checks_m" => "required",
            "bypass_header_checks" => "required",
            "bypass_header_checks_m" => "required",
            "spam_tag_level" => "required",
            "spam_tag_level_m" => "required",
            "spam_tag2_level" => "required",
            "spam_tag2_level_m" => "required",
            "spam_tag3_level" => "required",
            "spam_tag3_level_m" => "required",
            "spam_kill_level" => "required",
            "spam_kill_level_m" => "required",
            "spam_dsn_cutoff_level" => "required",
            "spam_dsn_cutoff_level_m" => "required",
            "spam_quarantine_cutoff_level" => "required",
            "spam_quarantine_cutoff_level_m" => "required",
            "spam_modifies_subject" => "required",
            "spam_modifies_subject_m" => "required",
            "spam_tag_subject" => "required",
            "spam_tag_subject_m" => "required",
            "spam_tag2_subject" => "required",
            "spam_tag2_subject_m" => "required",
            "spam_tag3_subject_m" => "required",
            "max_message_size" => "required",
            "max_message_size_m" => "required",
            "banned_files" => "required",
            "banned_files_m" => "required",
            "sender_whitelist" => "required",
            "sender_whitelist_m" => "required",
            "sender_blacklist" => "required",
            "sender_blacklist_m" => "required",
            "notify_admin_newvirus" => "required",
            "notify_admin_newvirus_m" => "required",
            "notify_admin_virus" => "required",
            "notify_admin_virus_m" => "required",
            "notify_admin_spam" => "required",
            "notify_admin_spam_m" => "required",
            "notify_admin_banned_file" => "required",
            "notify_admin_banned_file_m" => "required",
            "notify_admin_bad_header" => "required",
            "notify_admin_bad_header_m" => "required",
            "quarantine_virus" => "required",
            "quarantine_virus_m" => "required",
            "quarantine_banned_file" => "required",
            "quarantine_banned_file_m" => "required",
            "quarantine_bad_header" => "required",
            "quarantine_bad_header_m" => "required",
            "quarantine_spam" => "required",
            "quarantine_spam_m" => "required",
            "bcc_to" => "required",
            "bcc_to_m" => "required",
            "comment" => "required",
            "disabled" => "required",
        ]);

        $amavisRules = new AmavisRules();
        $amavisRules->PolicyId = $request->policy_id;
        $amavisRules->Name = $request->name;
        $amavisRules->bypass_virus_checks = $request->bypass_virus_checks;
        $amavisRules->bypass_virus_checks_m = $request->bypass_virus_checks_m;
        $amavisRules->bypass_banned_checks = $request->bypass_banned_checks;
        $amavisRules->bypass_banned_checks_m = $request->bypass_banned_checks_m;
        $amavisRules->bypass_spam_checks = $request->bypass_spam_checks;
        $amavisRules->bypass_spam_checks_m = $request->bypass_spam_checks_m;
        $amavisRules->bypass_header_checks = $request->bypass_header_checks;
        $amavisRules->bypass_header_checks_m = $request->bypass_header_checks_m;
        $amavisRules->spam_tag_level = $request->spam_tag_level;
        $amavisRules->spam_tag_level_m = $request->spam_tag_level_m;
        $amavisRules->spam_tag2_level = $request->spam_tag2_level;
        $amavisRules->spam_tag2_level_m = $request->spam_tag2_level_m;
        $amavisRules->spam_tag3_level = $request->spam_tag3_level;
        $amavisRules->spam_tag3_level_m = $request->spam_tag3_level_m;
        $amavisRules->spam_kill_level = $request->spam_kill_level;
        $amavisRules->spam_kill_level_m = $request->spam_kill_level_m;
        $amavisRules->spam_dsn_cutoff_level = $request->spam_dsn_cutoff_level;
        $amavisRules->spam_dsn_cutoff_level_m = $request->spam_dsn_cutoff_level_m;
        $amavisRules->spam_quarantine_cutoff_level = $request->spam_quarantine_cutoff_level;
        $amavisRules->spam_quarantine_cutoff_level_m = $request->spam_quarantine_cutoff_level_m;
        $amavisRules->spam_modifies_subject = $request->spam_modifies_subject;
        $amavisRules->spam_modifies_subject_m = $request->spam_modifies_subject_m;
        $amavisRules->spam_tag_subject = $request->spam_tag_subject;
        $amavisRules->spam_tag_subject_m = $request->spam_tag_subject_m;
        $amavisRules->spam_tag2_subject = $request->spam_tag2_subject;
        $amavisRules->spam_tag2_subject_m = $request->spam_tag2_subject_m;
        $amavisRules->spam_tag3_subject_m = $request->spam_tag3_subject_m;
        $amavisRules->max_message_size = $request->max_message_size;
        $amavisRules->max_message_size_m = $request->max_message_size_m;
        $amavisRules->banned_files = $request->banned_files;
        $amavisRules->banned_files_m = $request->banned_files_m;
        $amavisRules->sender_whitelist = $request->sender_whitelist;
        $amavisRules->sender_whitelist_m = $request->sender_whitelist_m;
        $amavisRules->sender_blacklist = $request->sender_blacklist;
        $amavisRules->sender_blacklist_m = $request->sender_blacklist_m;
        $amavisRules->notify_admin_newvirus = $request->notify_admin_newvirus;
        $amavisRules->notify_admin_newvirus_m = $request->notify_admin_newvirus_m;
        $amavisRules->notify_admin_virus = $request->notify_admin_virus;
        $amavisRules->notify_admin_virus_m = $request->notify_admin_virus_m;
        $amavisRules->notify_admin_spam = $request->notify_admin_spam;
        $amavisRules->notify_admin_spam_m = $request->notify_admin_spam_m;
        $amavisRules->notify_admin_banned_file = $request->notify_admin_banned_file;
        $amavisRules->notify_admin_banned_file_m = $request->notify_admin_banned_file_m;
        $amavisRules->notify_admin_bad_header = $request->notify_admin_bad_header;
        $amavisRules->notify_admin_bad_header_m = $request->notify_admin_bad_header_m;
        $amavisRules->quarantine_virus = $request->quarantine_virus;
        $amavisRules->quarantine_virus_m = $request->quarantine_virus_m;
        $amavisRules->quarantine_banned_file = $request->quarantine_banned_file;
        $amavisRules->quarantine_banned_file_m = $request->quarantine_banned_file_m;
        $amavisRules->quarantine_bad_header = $request->quarantine_bad_header;
        $amavisRules->quarantine_bad_header_m = $request->quarantine_bad_header_m;
        $amavisRules->quarantine_spam = $request->quarantine_spam;
        $amavisRules->quarantine_spam_m = $request->quarantine_spam_m;
        $amavisRules->bcc_to = $request->bcc_to;
        $amavisRules->bcc_to_m = $request->bcc_to_m;
        $amavisRules->Comment = $request->comment;
        $amavisRules->Disabled = $request->disabled;
        
        
        if ($amavisRules->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $amavisRules]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);

    }

    public function deleteAmavisRules(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = AmavisRules::destroy($id);

        if ($result >= 1) {
            return response()->json(["code" => 200, "message" => "deleted"]);
        }
        return response()->json(["code" => 400, "message" => "not deleted"]);
    }

    public function updateAmavisRules(Request $request, string $id): \Illuminate\Http\JsonResponse
    {

        $validation = $request->validate([
            "policy_id" => "required",
            "name" => "required",
            "bypass_virus_checks" => "required",
            "bypass_virus_checks_m" => "required",
            "bypass_banned_checks" => "required",
            "bypass_banned_checks_m" => "required",
            "bypass_spam_checks" => "required",
            "bypass_spam_checks_m" => "required",
            "bypass_header_checks" => "required",
            "bypass_header_checks_m" => "required",
            "spam_tag_level" => "required",
            "spam_tag_level_m" => "required",
            "spam_tag2_level" => "required",
            "spam_tag2_level_m" => "required",
            "spam_tag3_level" => "required",
            "spam_tag3_level_m" => "required",
            "spam_kill_level" => "required",
            "spam_kill_level_m" => "required",
            "spam_dsn_cutoff_level" => "required",
            "spam_dsn_cutoff_level_m" => "required",
            "spam_quarantine_cutoff_level" => "required",
            "spam_quarantine_cutoff_level_m" => "required",
            "spam_modifies_subject" => "required",
            "spam_modifies_subject_m" => "required",
            "spam_tag_subject" => "required",
            "spam_tag_subject_m" => "required",
            "spam_tag2_subject" => "required",
            "spam_tag2_subject_m" => "required",
            "spam_tag3_subject_m" => "required",
            "max_message_size" => "required",
            "max_message_size_m" => "required",
            "banned_files" => "required",
            "banned_files_m" => "required",
            "sender_whitelist" => "required",
            "sender_whitelist_m" => "required",
            "sender_blacklist" => "required",
            "sender_blacklist_m" => "required",
            "notify_admin_newvirus" => "required",
            "notify_admin_newvirus_m" => "required",
            "notify_admin_virus" => "required",
            "notify_admin_virus_m" => "required",
            "notify_admin_spam" => "required",
            "notify_admin_spam_m" => "required",
            "notify_admin_banned_file" => "required",
            "notify_admin_banned_file_m" => "required",
            "notify_admin_bad_header" => "required",
            "notify_admin_bad_header_m" => "required",
            "quarantine_virus" => "required",
            "quarantine_virus_m" => "required",
            "quarantine_banned_file" => "required",
            "quarantine_banned_file_m" => "required",
            "quarantine_bad_header" => "required",
            "quarantine_bad_header_m" => "required",
            "quarantine_spam" => "required",
            "quarantine_spam_m" => "required",
            "bcc_to" => "required",
            "bcc_to_m" => "required",
            "comment" => "required",
            "disabled" => "required",
        ]);

        $amavisRules = AmavisRules::find($id);
        $amavisRules->PolicyId = $request->policy_id;
        $amavisRules->Name = $request->name;
        $amavisRules->bypass_virus_checks = $request->bypass_virus_checks;
        $amavisRules->bypass_virus_checks_m = $request->bypass_virus_checks_m;
        $amavisRules->bypass_banned_checks = $request->bypass_banned_checks;
        $amavisRules->bypass_banned_checks_m = $request->bypass_banned_checks_m;
        $amavisRules->bypass_spam_checks = $request->bypass_spam_checks;
        $amavisRules->bypass_spam_checks_m = $request->bypass_spam_checks_m;
        $amavisRules->bypass_header_checks = $request->bypass_header_checks;
        $amavisRules->bypass_header_checks_m = $request->bypass_header_checks_m;
        $amavisRules->spam_tag_level = $request->spam_tag_level;
        $amavisRules->spam_tag_level_m = $request->spam_tag_level_m;
        $amavisRules->spam_tag2_level = $request->spam_tag2_level;
        $amavisRules->spam_tag2_level_m = $request->spam_tag2_level_m;
        $amavisRules->spam_tag3_level = $request->spam_tag3_level;
        $amavisRules->spam_tag3_level_m = $request->spam_tag3_level_m;
        $amavisRules->spam_kill_level = $request->spam_kill_level;
        $amavisRules->spam_kill_level_m = $request->spam_kill_level_m;
        $amavisRules->spam_dsn_cutoff_level = $request->spam_dsn_cutoff_level;
        $amavisRules->spam_dsn_cutoff_level_m = $request->spam_dsn_cutoff_level_m;
        $amavisRules->spam_quarantine_cutoff_level = $request->spam_quarantine_cutoff_level;
        $amavisRules->spam_quarantine_cutoff_level_m = $request->spam_quarantine_cutoff_level_m;
        $amavisRules->spam_modifies_subject = $request->spam_modifies_subject;
        $amavisRules->spam_modifies_subject_m = $request->spam_modifies_subject_m;
        $amavisRules->spam_tag_subject = $request->spam_tag_subject;
        $amavisRules->spam_tag_subject_m = $request->spam_tag_subject_m;
        $amavisRules->spam_tag2_subject = $request->spam_tag2_subject;
        $amavisRules->spam_tag2_subject_m = $request->spam_tag2_subject_m;
        $amavisRules->spam_tag3_subject_m = $request->spam_tag3_subject_m;
        $amavisRules->max_message_size = $request->max_message_size;
        $amavisRules->max_message_size_m = $request->max_message_size_m;
        $amavisRules->banned_files = $request->banned_files;
        $amavisRules->banned_files_m = $request->banned_files_m;
        $amavisRules->sender_whitelist = $request->sender_whitelist;
        $amavisRules->sender_whitelist_m = $request->sender_whitelist_m;
        $amavisRules->sender_blacklist = $request->sender_blacklist;
        $amavisRules->sender_blacklist_m = $request->sender_blacklist_m;
        $amavisRules->notify_admin_newvirus = $request->notify_admin_newvirus;
        $amavisRules->notify_admin_newvirus_m = $request->notify_admin_newvirus_m;
        $amavisRules->notify_admin_virus = $request->notify_admin_virus;
        $amavisRules->notify_admin_virus_m = $request->notify_admin_virus_m;
        $amavisRules->notify_admin_spam = $request->notify_admin_spam;
        $amavisRules->notify_admin_spam_m = $request->notify_admin_spam_m;
        $amavisRules->notify_admin_banned_file = $request->notify_admin_banned_file;
        $amavisRules->notify_admin_banned_file_m = $request->notify_admin_banned_file_m;
        $amavisRules->notify_admin_bad_header = $request->notify_admin_bad_header;
        $amavisRules->notify_admin_bad_header_m = $request->notify_admin_bad_header_m;
        $amavisRules->quarantine_virus = $request->quarantine_virus;
        $amavisRules->quarantine_virus_m = $request->quarantine_virus_m;
        $amavisRules->quarantine_banned_file = $request->quarantine_banned_file;
        $amavisRules->quarantine_banned_file_m = $request->quarantine_banned_file_m;
        $amavisRules->quarantine_bad_header = $request->quarantine_bad_header;
        $amavisRules->quarantine_bad_header_m = $request->quarantine_bad_header_m;
        $amavisRules->quarantine_spam = $request->quarantine_spam;
        $amavisRules->quarantine_spam_m = $request->quarantine_spam_m;
        $amavisRules->bcc_to = $request->bcc_to;
        $amavisRules->bcc_to_m = $request->bcc_to_m;
        $amavisRules->Comment = $request->comment;
        $amavisRules->Disabled = $request->disabled;
        
        if ($amavisRules->save()) {
            return response()->json(["code" => 200, "message" => "created", "data" => $amavisRules]);
        }
        return response()->json(["code" => 400, "message" => "wrong property"]);
    }
}
