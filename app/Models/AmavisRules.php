<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmavisRules extends Model
{
    use HasFactory;

    protected $fillable = [
        "PolicyID",
        "Name",
        "bypass_virus_checks",
        "bypass_virus_checks_m",
        "bypass_banned_checks",
        "bypass_banned_checks_m",
        "bypass_spam_checks",
        "bypass_spam_checks_m",
        "bypass_header_checks",
        "bypass_header_checks_m",
        "spam_tag_level",
        "spam_tag_level_m",
        "spam_tag2_level",
        "spam_tag2_level_m",
        "spam_tag3_level",
        "spam_tag3_level_m",
        "spam_kill_level",
        "spam_kill_level_m",
        "spam_dsn_cutoff_level",
        "spam_dsn_cutoff_level_m",
        "spam_quarantine_cutoff_level",
        "spam_quarantine_cutoff_level_m",
        "spam_modifies_subject",
        "spam_modifies_subject_m",
        "spam_tag_subject",
        "spam_tag_subject_m",
        "spam_tag2_subject",
        "spam_tag2_subject_m",
        "spam_tag3_subject_m",
        "max_message_size",
        "max_message_size_m",
        "banned_files",
        "banned_files_m",
        "sender_whitelist",
        "sender_whitelist_m",
        "sender_blacklist",
        "sender_blacklist_m",
        "notify_admin_newvirus",
        "notify_admin_newvirus_m",
        "notify_admin_virus",
        "notify_admin_virus_m",
        "notify_admin_spam",
        "notify_admin_spam_m",
        "notify_admin_banned_file",
        "notify_admin_banned_file_m",
        "notify_admin_bad_header",
        "notify_admin_bad_header_m",
        "quarantine_virus",
        "quarantine_virus_m",
        "quarantine_banned_file",
        "quarantine_banned_file_m",
        "quarantine_bad_header",
        "quarantine_bad_header_m",
        "quarantine_spam",
        "quarantine_spam_m",
        "bcc_to",
        "bcc_to_m",
        "Comment",
        "Disabled",
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $table = 'amavis_rules';
}
