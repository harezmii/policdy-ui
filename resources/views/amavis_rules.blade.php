<x-layout.default>
    <div x-data="result">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Amavis Rules</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="saveList">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor"
                                        stroke-width="1.5"/>
                                <path opacity="0.5"
                                      d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                      stroke="currentColor" stroke-width="1.5"/>
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            Add AmavisRules
                        </button>

                        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                             :class="addAmavisRulesModal && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                 @click.self="addAmavisRulesModal = false">
                                <div x-show="addAmavisRulesModal" x-transition x-transition.duration.300
                                     class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                    <button type="button"
                                            class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                            @click="addAmavisRulesModal = false">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                        x-text="params.ID ? 'Edit AmavisRules' : 'Add AmavisRules'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="params.ID ? updateList(params) : createList">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="policy_id">PolicyID</label>
                                                <input id="policy_id" type="text" placeholder="Enter PolicyID"
                                                       class="form-input" x-model="params.PolicyID"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" placeholder="Enter Name"
                                                       class="form-input" x-model="params.Name"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_virus_checks">bypass_virus_checks</label>
                                                <input id="bypass_virus_checks" type="text" placeholder="Enter bypass_virus_checks"
                                                       class="form-input" x-model="params.bypass_virus_checks"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_virus_checks_m">bypass_virus_checks_m</label>
                                                <input id="bypass_virus_checks_m" type="text" placeholder="Enter bypass_virus_checks_m"
                                                       class="form-input" x-model="params.bypass_virus_checks_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_banned_checks">bypass_virus_checks_m</label>
                                                <input id="bypass_banned_checks" type="text" placeholder="Enter bypass_banned_checks"
                                                       class="form-input" x-model="params.bypass_banned_checks"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_banned_checks_m">bypass_virus_checks_m</label>
                                                <input id="bypass_banned_checks_m" type="text" placeholder="Enter bypass_banned_checks_m"
                                                       class="form-input" x-model="params.bypass_banned_checks_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_spam_checks">bypass_virus_checks_m</label>
                                                <input id="bypass_spam_checks" type="text" placeholder="Enter bypass_spam_checks"
                                                       class="form-input" x-model="params.bypass_spam_checks"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_spam_checks_m">bypass_virus_checks_m</label>
                                                <input id="bypass_spam_checks_m" type="text" placeholder="Enter bypass_spam_checks_m"
                                                       class="form-input" x-model="params.bypass_spam_checks_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_header_checks">bypass_virus_checks_m</label>
                                                <input id="bypass_header_checks" type="text" placeholder="Enter bypass_header_checks"
                                                       class="form-input" x-model="params.bypass_header_checks"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bypass_header_checks_m">bypass_virus_checks_m</label>
                                                <input id="bypass_header_checks_m" type="text" placeholder="Enter bypass_header_checks_m"
                                                       class="form-input" x-model="params.bypass_header_checks_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag_level">spam_tag_level</label>
                                                <input id="spam_tag_level" type="text" placeholder="Enter spam_tag_level"
                                                       class="form-input" x-model="params.spam_tag_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag_level_m">spam_tag_level_m</label>
                                                <input id="spam_tag_level_m" type="text" placeholder="Enter spam_tag_level_m"
                                                       class="form-input" x-model="params.spam_tag_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag_level_m">spam_tag_level_m</label>
                                                <input id="spam_tag_level_m" type="text" placeholder="Enter spam_tag_level_m"
                                                       class="form-input" x-model="params.spam_tag_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag2_level">spam_tag2_level</label>
                                                <input id="spam_tag2_level" type="text" placeholder="Enter spam_tag2_level"
                                                       class="form-input" x-model="params.spam_tag2_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag2_level_m">spam_tag2_level_m</label>
                                                <input id="spam_tag2_level_m" type="text" placeholder="Enter spam_tag2_level_m"
                                                       class="form-input" x-model="params.spam_tag2_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag2_level_m">spam_tag2_level_m</label>
                                                <input id="spam_tag2_level_m" type="text" placeholder="Enter spam_tag2_level_m"
                                                       class="form-input" x-model="params.spam_tag2_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag3_level">spam_tag3_level</label>
                                                <input id="spam_tag3_level" type="text" placeholder="Enter spam_tag3_level"
                                                       class="form-input" x-model="params.spam_tag3_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag3_level_m">spam_tag3_level_m</label>
                                                <input id="spam_tag3_level_m" type="text" placeholder="Enter spam_tag3_level_m"
                                                       class="form-input" x-model="params.spam_tag3_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_kill_level">spam_kill_level</label>
                                                <input id="spam_kill_level" type="text" placeholder="Enter spam_kill_level"
                                                       class="form-input" x-model="params.spam_kill_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_kill_level_m">spam_kill_level_m</label>
                                                <input id="spam_kill_level_m" type="text" placeholder="Enter spam_kill_level_m"
                                                       class="form-input" x-model="params.spam_kill_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_dsn_cutoff_level">spam_dsn_cutoff_level</label>
                                                <input id="spam_dsn_cutoff_level" type="text" placeholder="Enter spam_dsn_cutoff_level"
                                                       class="form-input" x-model="params.spam_dsn_cutoff_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_dsn_cutoff_level_m">spam_dsn_cutoff_level_m</label>
                                                <input id="spam_dsn_cutoff_level_m" type="text" placeholder="Enter spam_dsn_cutoff_level_m"
                                                       class="form-input" x-model="params.spam_dsn_cutoff_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_quarantine_cutoff_level">spam_quarantine_cutoff_level</label>
                                                <input id="spam_quarantine_cutoff_level" type="text" placeholder="Enter spam_quarantine_cutoff_level"
                                                       class="form-input" x-model="params.spam_quarantine_cutoff_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_quarantine_cutoff_level">spam_quarantine_cutoff_level</label>
                                                <input id="spam_quarantine_cutoff_level" type="text" placeholder="Enter spam_quarantine_cutoff_level"
                                                       class="form-input" x-model="params.spam_quarantine_cutoff_level"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_quarantine_cutoff_level_m">spam_quarantine_cutoff_level_m</label>
                                                <input id="spam_quarantine_cutoff_level_m" type="text" placeholder="Enter spam_quarantine_cutoff_level_m"
                                                       class="form-input" x-model="params.spam_quarantine_cutoff_level_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_modifies_subject">spam_modifies_subject</label>
                                                <input id="spam_modifies_subject" type="text" placeholder="Enter spam_modifies_subject"
                                                       class="form-input" x-model="params.spam_modifies_subject"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_modifies_subject_m">spam_modifies_subject_m</label>
                                                <input id="spam_modifies_subject_m" type="text" placeholder="Enter spam_modifies_subject_m"
                                                       class="form-input" x-model="params.spam_modifies_subject_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag_subject">spam_tag_subject</label>
                                                <input id="spam_tag_subject" type="text" placeholder="Enter spam_tag_subject"
                                                       class="form-input" x-model="params.spam_tag_subject"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag_subject_m">spam_tag_subject_m</label>
                                                <input id="spam_tag_subject_m" type="text" placeholder="Enter spam_tag_subject_m"
                                                       class="form-input" x-model="params.spam_tag_subject_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag2_subject">spam_tag2_subject</label>
                                                <input id="spam_tag2_subject" type="text" placeholder="Enter spam_tag2_subject"
                                                       class="form-input" x-model="params.spam_tag2_subject"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag2_subject_m">spam_tag2_subject_m</label>
                                                <input id="spam_tag2_subject_m" type="text" placeholder="Enter spam_tag2_subject_m"
                                                       class="form-input" x-model="params.spam_tag2_subject_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag3_subject">spam_tag3_subject</label>
                                                <input id="spam_tag3_subject" type="text" placeholder="Enter spam_tag3_subject"
                                                       class="form-input" x-model="params.spam_tag3_subject"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="spam_tag3_subject_m">spam_tag3_subject</label>
                                                <input id="spam_tag3_subject_m" type="text" placeholder="Enter spam_tag3_subject_m"
                                                       class="form-input" x-model="params.spam_tag3_subject_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="max_message_size">max_message_size</label>
                                                <input id="max_message_size" type="text" placeholder="Enter max_message_size"
                                                       class="form-input" x-model="params.max_message_size"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="max_message_size_m">max_message_size_m</label>
                                                <input id="max_message_size_m" type="text" placeholder="Enter max_message_size_m"
                                                       class="form-input" x-model="params.max_message_size_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="banned_files">banned_files</label>
                                                <input id="banned_files" type="text" placeholder="Enter banned_files"
                                                       class="form-input" x-model="params.banned_files"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="banned_files_m">banned_files_m</label>
                                                <input id="banned_files_m" type="text" placeholder="Enter banned_files_m"
                                                       class="form-input" x-model="params.banned_files_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="sender_whitelist">sender_whitelist</label>
                                                <input id="sender_whitelist" type="text" placeholder="Enter sender_whitelist"
                                                       class="form-input" x-model="params.sender_whitelist"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="sender_whitelist_m">sender_whitelist_m</label>
                                                <input id="sender_whitelist_m" type="text" placeholder="Enter sender_whitelist_m"
                                                       class="form-input" x-model="params.sender_whitelist_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="sender_blacklist">sender_blacklist</label>
                                                <input id="sender_blacklist" type="text" placeholder="Enter sender_blacklist"
                                                       class="form-input" x-model="params.sender_blacklist"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="sender_blacklist_m">sender_blacklist_m</label>
                                                <input id="sender_blacklist_m" type="text" placeholder="Enter sender_blacklist_m"
                                                       class="form-input" x-model="params.sender_blacklist_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_newvirus">notify_admin_newvirus</label>
                                                <input id="notify_admin_newvirus" type="text" placeholder="Enter notify_admin_newvirus"
                                                       class="form-input" x-model="params.notify_admin_newvirus"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_newvirus_m">notify_admin_newvirus_m</label>
                                                <input id="notify_admin_newvirus_m" type="text" placeholder="Enter notify_admin_newvirus_m"
                                                       class="form-input" x-model="params.notify_admin_newvirus_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_virus">notify_admin_virus</label>
                                                <input id="notify_admin_virus" type="text" placeholder="Enter notify_admin_virus"
                                                       class="form-input" x-model="params.notify_admin_virus"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_virus_m">notify_admin_virus_m</label>
                                                <input id="notify_admin_virus_m" type="text" placeholder="Enter notify_admin_virus_m"
                                                       class="form-input" x-model="params.notify_admin_virus_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_spam">notify_admin_spam</label>
                                                <input id="notify_admin_spam" type="text" placeholder="Enter notify_admin_spam"
                                                       class="form-input" x-model="params.notify_admin_spam"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_spam_m">notify_admin_spam_m</label>
                                                <input id="notify_admin_spam_m" type="text" placeholder="Enter notify_admin_spam_m"
                                                       class="form-input" x-model="params.notify_admin_spam_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_banned_file">notify_admin_banned_file</label>
                                                <input id="notify_admin_banned_file" type="text" placeholder="Enter notify_admin_banned_file"
                                                       class="form-input" x-model="params.notify_admin_banned_file"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_banned_file_m">notify_admin_banned_file_m</label>
                                                <input id="notify_admin_banned_file_m" type="text" placeholder="Enter notify_admin_banned_file_m"
                                                       class="form-input" x-model="params.notify_admin_banned_file_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_bad_header">notify_admin_bad_header</label>
                                                <input id="notify_admin_bad_header" type="text" placeholder="Enter notify_admin_bad_header"
                                                       class="form-input" x-model="params.notify_admin_bad_header"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="notify_admin_bad_header_m">notify_admin_bad_header_m</label>
                                                <input id="notify_admin_bad_header_m" type="text" placeholder="Enter notify_admin_bad_header_m"
                                                       class="form-input" x-model="params.notify_admin_bad_header_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_virus">quarantine_virus</label>
                                                <input id="quarantine_virus" type="text" placeholder="Enter quarantine_virus"
                                                       class="form-input" x-model="params.quarantine_virus"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_virus_m">quarantine_virus_m</label>
                                                <input id="quarantine_virus_m" type="text" placeholder="Enter quarantine_virus_m"
                                                       class="form-input" x-model="params.quarantine_virus_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_banned_file">quarantine_banned_file</label>
                                                <input id="quarantine_banned_file" type="text" placeholder="Enter quarantine_banned_file"
                                                       class="form-input" x-model="params.quarantine_banned_file"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_banned_file_m">quarantine_banned_file_m</label>
                                                <input id="quarantine_banned_file_m" type="text" placeholder="Enter quarantine_banned_file_m"
                                                       class="form-input" x-model="params.quarantine_banned_file_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_bad_header">quarantine_bad_header</label>
                                                <input id="quarantine_bad_header" type="text" placeholder="Enter quarantine_bad_header"
                                                       class="form-input" x-model="params.quarantine_bad_header"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_bad_header_m">quarantine_bad_header_m</label>
                                                <input id="quarantine_bad_header_m" type="text" placeholder="Enter quarantine_bad_header_m"
                                                       class="form-input" x-model="params.quarantine_bad_header_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_spam">quarantine_spam</label>
                                                <input id="quarantine_spam" type="text" placeholder="Enter quarantine_spam"
                                                       class="form-input" x-model="params.quarantine_spam"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="quarantine_spam_m">quarantine_spam_m</label>
                                                <input id="quarantine_spam_m" type="text" placeholder="Enter quarantine_spam_m"
                                                       class="form-input" x-model="params.quarantine_spam_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bcc_to">bcc_to</label>
                                                <input id="bcc_to" type="text" placeholder="Enter bcc_to"
                                                       class="form-input" x-model="params.bcc_to"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="bcc_to_m">bcc_to_m</label>
                                                <input id="bcc_to_m" type="text" placeholder="Enter bcc_to_m"
                                                       class="form-input" x-model="params.bcc_to_m"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="Comment">Comment</label>
                                                <input id="Comment" type="text" placeholder="Enter Comment"
                                                       class="form-input" x-model="params.Comment"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="disabled">Disabled</label>
                                                <input id="disabled" type="text" placeholder="Enter Disabled (0 or 1)"
                                                       class="form-input" x-model="params.Disabled"/>
                                            </div>

                                            <div class="flex justify-end items-center mt-8">
                                                <button type="button" class="btn btn-outline-danger"
                                                        @click="addContactModal = false">Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                        x-text="params.ID ? 'Update' : 'Add'"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Search Bar   -->
                <div class="relative ">
                    <input type="text" placeholder="Search AmavisRules"
                           class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" x-model="searchAmavisRulesList"
                           @keyup="searchData"/>
                    <div
                            class="absolute ltr:right-[11px] rtl:left-[11px] top-1/2 -translate-y-1/2 peer-focus:text-primary">

                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                    stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>

            </div>
        </div>

        <!-- Table -->

        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                        <tr>
                            <th>PolicyID</th>
                            <th>Name</th>
                            <th>bypass_virus_checks</th>
                            <th>bypass_virus_checks_m</th>
                            <th>bypass_banned_checks</th>
                            <th>bypass_banned_checks_m</th>
                            <th>bypass_spam_checks</th>
                            <th>bypass_spam_checks_m</th>
                            <th>bypass_header_checks</th>
                            <th>bypass_header_checks_m</th>
                            <th>spam_tag_level</th>
                            <th>spam_tag_level_m</th>
                            <th>spam_tag2_level</th>
                            <th>spam_tag2_level_m</th>
                            <th>spam_tag3_level</th>
                            <th>spam_tag3_level_m</th>
                            <th>spam_kill_level</th>
                            <th>spam_kill_level_m</th>
                            <th>spam_dsn_cutoff_level</th>
                            <th>spam_dsn_cutoff_level_m</th>
                            <th>spam_quarantine_cutoff_level</th>
                            <th>spam_quarantine_cutoff_level_m</th>
                            <th>spam_modifies_subject</th>
                            <th>spam_modifies_subject_m</th>
                            <th>spam_tag_subject</th>
                            <th>spam_tag_subject_m</th>
                            <th>spam_tag2_subject</th>
                            <th>spam_tag2_subject_m</th>
                            <th>spam_tag3_subject</th>
                            <th>spam_tag3_subject_m</th>
                            <th>max_message_size</th>
                            <th>max_message_size_m</th>
                            <th>banned_files</th>
                            <th>banned_files_m</th>
                            <th>sender_whitelist</th>
                            <th>sender_whitelist_m</th>
                            <th>sender_blacklist</th>
                            <th>sender_blacklist_m</th>
                            <th>notify_admin_newvirus</th>
                            <th>notify_admin_newvirus_m</th>
                            <th>notify_admin_virus</th>
                            <th>notify_admin_virus_m</th>
                            <th>notify_admin_spam</th>
                            <th>notify_admin_spam_m</th>
                            <th>notify_admin_banned_file</th>
                            <th>notify_admin_banned_file_m</th>
                            <th>notify_admin_bad_header</th>
                            <th>notify_admin_bad_header_m</th>
                            <th>quarantine_virus</th>
                            <th>quarantine_virus_m</th>
                            <th>quarantine_banned_file</th>
                            <th>quarantine_banned_file_m</th>
                            <th>quarantine_bad_header</th>
                            <th>quarantine_bad_header_m</th>
                            <th>quarantine_spam</th>
                            <th>quarantine_spam_m</th>
                            <th>bcc_to</th>
                            <th>bcc_to_m</th>
                            <th>Comment</th>
                            <th>Disabled</th>
                            <th class="!text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="data in dataList" :key="data.ID">
                            <tr>
                                <td x-text="data.PolicyID"></td>
                                <td x-text="data.Name"></td>
                                <td x-text="data.bypass_virus_checks"></td>
                                <td x-text="data.bypass_virus_checks_m"></td>
                                <td x-text="data.bypass_banned_checks"></td>
                                <td x-text="data.bypass_banned_checks_m"></td>
                                <td x-text="data.bypass_spam_checks"></td>
                                <td x-text="data.bypass_spam_checks_m"></td>
                                <td x-text="data.bypass_header_checks"></td>
                                <td x-text="data.bypass_header_checks_m"></td>
                                <td x-text="data.spam_kill_level"></td>
                                <td x-text="data.spam_kill_level_m"></td>
                                <td x-text="data.spam_dsn_cutoff_level"></td>
                                <td x-text="data.spam_dsn_cutoff_level_m"></td>
                                <td x-text="data.spam_quarantine_cutoff_level"></td>
                                <td x-text="data.spam_quarantine_cutoff_level_m"></td>
                                <td x-text="data.spam_modifies_subject"></td>
                                <td x-text="data.spam_modifies_subject_m"></td>
                                <td x-text="data.spam_tag_subject"></td>
                                <td x-text="data.spam_tag_subject_m"></td>
                                <td x-text="data.spam_tag2_subject"></td>
                                <td x-text="data.spam_tag2_subject_m"></td>
                                <td x-text="data.spam_tag3_subject"></td>
                                <td x-text="data.spam_tag3_subject_m"></td>
                                <td x-text="data.max_message_size"></td>
                                <td x-text="data.max_message_size_m"></td>
                                <td x-text="data.banned_files"></td>
                                <td x-text="data.banned_files_m"></td>
                                <td x-text="data.sender_whitelist"></td>
                                <td x-text="data.sender_whitelist_m"></td>
                                <td x-text="data.sender_blacklist"></td>
                                <td x-text="data.sender_blacklist_m"></td>
                                <td x-text="data.notify_admin_newvirus"></td>
                                <td x-text="data.notify_admin_newvirus_m"></td>
                                <td x-text="data.notify_admin_virus"></td>
                                <td x-text="data.notify_admin_virus_m"></td>
                                <td x-text="data.notify_admin_spam"></td>
                                <td x-text="data.notify_admin_spam_m"></td>
                                <td x-text="data.notify_admin_banned_file"></td>
                                <td x-text="data.notify_admin_banned_file_m"></td>
                                <td x-text="data.notify_admin_bad_header"></td>
                                <td x-text="data.notify_admin_bad_header_m"></td>
                                <td x-text="data.quarantine_virus"></td>
                                <td x-text="data.quarantine_virus_m"></td>
                                <td x-text="data.quarantine_banned_file"></td>
                                <td x-text="data.quarantine_banned_file_m"></td>
                                <td x-text="data.quarantine_bad_header"></td>
                                <td x-text="data.quarantine_bad_header_m"></td>
                                <td x-text="data.quarantine_spam"></td>
                                <td x-text="data.quarantine_spam_m"></td>
                                <td x-text="data.bcc_to"></td>
                                <td x-text="data.bcc_to_m"></td>
                                <td x-text="data.Comment"></td>
                                
                                <td>
                                    <span x-text="data.Disabled == 1 ?  'Disable' : 'Enable'" :class="data.Disabled == 1 ? 'badge badge-outline-danger' : 'badge badge-outline-success' "></span>
                                </td>
                                <td>
                                    <div class="flex gap-4 items-center justify-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editList(data)">Edit
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteList(data)">Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("result", () => ({

                defaultParams: {
                    ID: null,
                    PolicyID: '',
                    Name: '',
                    bypass_virus_checks: '',
                    bypass_virus_checks_m: '',
                    bypass_banned_checks: '',
                    bypass_banned_checks_m: '',
                    bypass_spam_checks: '',
                    bypass_spam_checks_m: '',
                    bypass_header_checks: '',
                    bypass_header_checks_m: '',
                    spam_tag_level: '',
                    spam_tag_level_m: '',
                    spam_tag2_level: '',
                    spam_tag2_level_m: '',
                    spam_tag3_level: '',
                    spam_tag3_level_m: '',
                    spam_kill_level: '',
                    spam_kill_level_m: '',
                    spam_dsn_cutoff_level: '',
                    spam_dsn_cutoff_level_m: '',
                    spam_quarantine_cutoff_level: '',
                    spam_quarantine_cutoff_level_m: '',
                    spam_modifies_subject: '',
                    spam_modifies_subject_m: '',
                    spam_tag_subject: '',
                    spam_tag_subject_m: '',
                    spam_tag2_subject: '',
                    spam_tag2_subject_m: '',
                    spam_tag3_subject_m: '',
                    max_message_size: '',
                    max_message_size_m: '',
                    banned_files: '',
                    banned_files_m: '',
                    sender_whitelist: '',
                    sender_whitelist_m: '',
                    sender_blacklist: '',
                    sender_blacklist_m: '',
                    notify_admin_newvirus: '',
                    notify_admin_newvirus_m: '',
                    notify_admin_virus: '',
                    notify_admin_virus_m: '',
                    notify_admin_spam: '',
                    notify_admin_spam_m: '',
                    notify_admin_banned_file: '',
                    notify_admin_banned_file_m: '',
                    notify_admin_bad_header: '',
                    notify_admin_bad_header_m: '',
                    quarantine_virus: '',
                    quarantine_virus_m: '',
                    quarantine_banned_file: '',
                    quarantine_banned_file_m: '',
                    quarantine_bad_header: '',
                    quarantine_bad_header_m: '',
                    quarantine_spam: '',
                    quarantine_spam_m: '',
                    bcc_to: '',
                    bcc_to_m: '',
                    Comment: '',
                    Disabled: '',

                },
                displayType: 'list',
                addAmavisRulesModal: false,
                params: {
                    ID: null,
                    PolicyID: '',
                    Name: '',
                    bypass_virus_checks: '',
                    bypass_virus_checks_m: '',
                    bypass_banned_checks: '',
                    bypass_banned_checks_m: '',
                    bypass_spam_checks: '',
                    bypass_spam_checks_m: '',
                    bypass_header_checks: '',
                    bypass_header_checks_m: '',
                    spam_tag_level: '',
                    spam_tag_level_m: '',
                    spam_tag2_level: '',
                    spam_tag2_level_m: '',
                    spam_tag3_level: '',
                    spam_tag3_level_m: '',
                    spam_kill_level: '',
                    spam_kill_level_m: '',
                    spam_dsn_cutoff_level: '',
                    spam_dsn_cutoff_level_m: '',
                    spam_quarantine_cutoff_level: '',
                    spam_quarantine_cutoff_level_m: '',
                    spam_modifies_subject: '',
                    spam_modifies_subject_m: '',
                    spam_tag_subject: '',
                    spam_tag_subject_m: '',
                    spam_tag2_subject: '',
                    spam_tag2_subject_m: '',
                    spam_tag3_subject_m: '',
                    max_message_size: '',
                    max_message_size_m: '',
                    banned_files: '',
                    banned_files_m: '',
                    sender_whitelist: '',
                    sender_whitelist_m: '',
                    sender_blacklist: '',
                    sender_blacklist_m: '',
                    notify_admin_newvirus: '',
                    notify_admin_newvirus_m: '',
                    notify_admin_virus: '',
                    notify_admin_virus_m: '',
                    notify_admin_spam: '',
                    notify_admin_spam_m: '',
                    notify_admin_banned_file: '',
                    notify_admin_banned_file_m: '',
                    notify_admin_bad_header: '',
                    notify_admin_bad_header_m: '',
                    quarantine_virus: '',
                    quarantine_virus_m: '',
                    quarantine_banned_file: '',
                    quarantine_banned_file_m: '',
                    quarantine_bad_header: '',
                    quarantine_bad_header_m: '',
                    quarantine_spam: '',
                    quarantine_spam_m: '',
                    bcc_to: '',
                    bcc_to_m: '',
                    Comment: '',
                    Disabled: '',
                },
                dataList: [],
                searchAmavisRulesList: '',
                token: '',
                amavisRulesList: @json($result),

                init() {
                    this.searchData();
                    this.getToken();
                },
                async getToken() {
                    var response = await fetch("{{route('token')}}");
                    response.json().then(data => this.token = data.token);
                },
                searchData() {
                    this.dataList = this.amavisRulesList.filter((d) => d.Name.toLowerCase()
                        .includes(this.searchAmavisRulesList.toLowerCase()));
                },

                async editList(data) {
                    this.params = this.defaultParams;
                    if (data) {
                        this.params = JSON.parse(JSON.stringify(data));
                    }

                    this.addAmavisRulesModal = true;

                },

                async updateList(data) {
                    var id = data.ID;
                    const url = "{{ route('update_amavis_rules', ':id') }}".replace(':id', id);

                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                policy_id: data.PolicyID,
                                name: data.Name,
                                bypass_virus_checks: data.bypass_virus_checks,
                                bypass_virus_checks_m: data.bypass_virus_checks_m,
                                bypass_banned_checks: data.bypass_banned_checks,
                                bypass_banned_checks_m: data.bypass_banned_checks_m,
                                bypass_spam_checks: data.bypass_spam_checks,
                                bypass_spam_checks_m: data.bypass_spam_checks_m,
                                bypass_header_checks: data.bypass_header_checks,
                                bypass_header_checks_m: data.bypass_header_checks_m,
                                spam_tag_level: data.spam_tag_level,
                                spam_tag_level_m: data.spam_tag_level_m,
                                spam_tag2_level: data.spam_tag2_level,
                                spam_tag2_level_m: data.spam_tag2_level_m,
                                spam_tag3_level: data.spam_tag3_level,
                                spam_tag3_level_m: data.spam_tag3_level_m,
                                spam_kill_level: data.spam_kill_level,
                                spam_kill_level_m: data.spam_kill_level_m,
                                spam_dsn_cutoff_level: data.spam_dsn_cutoff_level,
                                spam_dsn_cutoff_level_m: data.spam_dsn_cutoff_level_m,
                                spam_quarantine_cutoff_level: data.spam_quarantine_cutoff_level,
                                spam_quarantine_cutoff_level_m: data.spam_quarantine_cutoff_level_m,
                                spam_modifies_subject: data.spam_modifies_subject,
                                spam_modifies_subject_m: data.spam_modifies_subject_m,
                                spam_tag_subject: data.spam_tag_subject,
                                spam_tag_subject_m: data.spam_tag_subject_m,
                                spam_tag2_subject: data.spam_tag2_subject,
                                spam_tag2_subject_m: data.spam_tag2_subject_m,
                                spam_tag3_subject_m: data.spam_tag3_subject_m,
                                max_message_size: data.max_message_size,
                                max_message_size_m: data.max_message_size_m,
                                banned_files: data.banned_files,
                                banned_files_m: data.banned_files_m,
                                sender_whitelist: data.sender_whitelist,
                                sender_whitelist_m: data.sender_whitelist_m,
                                sender_blacklist: data.sender_blacklist,
                                sender_blacklist_m: data.sender_blacklist_m,
                                notify_admin_newvirus: data.notify_admin_newvirus,
                                notify_admin_newvirus_m: data.notify_admin_newvirus_m,
                                notify_admin_virus: data.notify_admin_virus,
                                notify_admin_virus_m: data.notify_admin_virus_m,
                                notify_admin_spam: data.notify_admin_spam,
                                notify_admin_spam_m: data.notify_admin_spam_m,
                                notify_admin_banned_file: data.notify_admin_banned_file,
                                notify_admin_banned_file_m: data.notify_admin_banned_file_m,
                                notify_admin_bad_header: data.notify_admin_bad_header,
                                notify_admin_bad_header_m: data.notify_admin_bad_header_m,
                                quarantine_virus: data.quarantine_virus,
                                quarantine_virus_m: data.quarantine_virus_m,
                                quarantine_banned_file: data.quarantine_banned_file,
                                quarantine_banned_file_m: data.quarantine_banned_file_m,
                                quarantine_bad_header: data.quarantine_bad_header,
                                quarantine_bad_header_m: data.quarantine_bad_header_m,
                                quarantine_spam: data.quarantine_spam,
                                quarantine_spam_m: data.quarantine_spam_m,
                                bcc_to: data.bcc_to,
                                bcc_to_m: data.bcc_to_m,
                                comment: data.Comment,
                                disabled: data.Disabled,
                            })
                        }
                    )
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                this.showMessage('Policy not updated');

                            }
                            this.showMessage('Policy has been updated successfully.');
                            this.addAmavisRulesModal = false;

                        });
                    this.searchData();
                },

                async createList() {
                    this.addAmavisRulesModal = true;
                    if (!this.params.PolicyID) {
                        this.showMessage('PolicyID is required.', 'error');
                        return true;
                    }
                    if (!this.params.Name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_virus_checks) {
                        this.showMessage('bypass_virus_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_virus_checks_m) {
                        this.showMessage('bypass_virus_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_banned_checks) {
                        this.showMessage('bypass_banned_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_banned_checks_m) {
                        this.showMessage('bypass_banned_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_spam_checks) {
                        this.showMessage('bypass_spam_checks is required.', 'error');
                        return true;
                    }

                    if (!this.params.bypass_spam_checks_m) {
                        this.showMessage('bypass_spam_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_header_checks) {
                        this.showMessage('bypass_header_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_header_checks_m) {
                        this.showMessage('bypass_header_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_level) {
                        this.showMessage('spam_tag_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_level_m) {
                        this.showMessage('spam_tag_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_level) {
                        this.showMessage('spam_tag2_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_level_m) {
                        this.showMessage('spam_tag2_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_level) {
                        this.showMessage('spam_tag3_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_level_m) {
                        this.showMessage('spam_tag3_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_kill_level) {
                        this.showMessage('spam_kill_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_kill_level_m) {
                        this.showMessage('spam_kill_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_dsn_cutoff_level) {
                        this.showMessage('spam_dsn_cutoff_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_dsn_cutoff_level_m) {
                        this.showMessage('spam_dsn_cutoff_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_quarantine_cutoff_level) {
                        this.showMessage('spam_quarantine_cutoff_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_quarantine_cutoff_level_m) {
                        this.showMessage('spam_quarantine_cutoff_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_modifies_subject) {
                        this.showMessage('spam_modifies_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_modifies_subject_m) {
                        this.showMessage('spam_modifies_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_subject) {
                        this.showMessage('spam_tag_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_subject_m) {
                        this.showMessage('spam_tag_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_subject) {
                        this.showMessage('spam_tag2_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_subject_m) {
                        this.showMessage('spam_tag2_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_subject) {
                        this.showMessage('spam_tag3_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_subject_m) {
                        this.showMessage('spam_tag3_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.max_message_size) {
                        this.showMessage('max_message_size is required.', 'error');
                        return true;
                    }
                    if (!this.params.max_message_size_m) {
                        this.showMessage('max_message_size_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.banned_files) {
                        this.showMessage('banned_files is required.', 'error');
                        return true;
                    }
                    if (!this.params.banned_files_m) {
                        this.showMessage('banned_files_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_whitelist) {
                        this.showMessage('sender_whitelist is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_whitelist_m) {
                        this.showMessage('sender_whitelist_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_blacklist) {
                        this.showMessage('sender_blacklist is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_blacklist_m) {
                        this.showMessage('sender_blacklist_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_newvirus) {
                        this.showMessage('notify_admin_newvirus is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_newvirus_m) {
                        this.showMessage('notify_admin_newvirus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_virus) {
                        this.showMessage('notify_admin_virus is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_virus_m) {
                        this.showMessage('notify_admin_virus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_spam) {
                        this.showMessage('notify_admin_spam is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_spam_m) {
                        this.showMessage('notify_admin_spam_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_banned_file) {
                        this.showMessage('notify_admin_banned_file is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_banned_file_m) {
                        this.showMessage('notify_admin_banned_file_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_bad_header) {
                        this.showMessage('notify_admin_bad_header is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_bad_header_m) {
                        this.showMessage('notify_admin_bad_header_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_virus) {
                        this.showMessage('quarantine_virus is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_virus_m) {
                        this.showMessage('quarantine_virus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_banned_file) {
                        this.showMessage('quarantine_banned_file is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_banned_file_m) {
                        this.showMessage('quarantine_banned_file_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_bad_header) {
                        this.showMessage('quarantine_bad_header is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_bad_header_m) {
                        this.showMessage('quarantine_bad_header_m is required.', 'error');
                        return true;
                    }

                    if (!this.params.quarantine_bad_header_m) {
                        this.showMessage('quarantine_bad_header_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_spam) {
                        this.showMessage('quarantine_spam is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_spam_m) {
                        this.showMessage('quarantine_spam_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bcc_to) {
                        this.showMessage('bcc_to is required.', 'error');
                        return true;
                    }
                    if (!this.params.bcc_to_m) {
                        this.showMessage('bcc_to_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.Comment) {
                        this.showMessage('Comment is required.', 'error');
                        return true;
                    }

                    if (!this.params.Disabled) {
                        this.showMessage('Disabled is required.', 'error');
                        return true;
                    }
                    const url = "{{ route('create_amavis_rules') }}";
                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                policy_id: this.params.PolicyID,
                                name: this.params.Name,
                                bypass_virus_checks: this.params.bypass_virus_checks,
                                bypass_virus_checks_m: this.params.bypass_virus_checks_m,
                                bypass_banned_checks: this.params.bypass_banned_checks,
                                bypass_banned_checks_m: this.params.bypass_banned_checks_m,
                                bypass_spam_checks: this.params.bypass_spam_checks,
                                bypass_spam_checks_m: this.params.bypass_spam_checks_m,
                                bypass_header_checks: this.params.bypass_header_checks,
                                bypass_header_checks_m: this.params.bypass_header_checks_m,
                                spam_tag_level: this.params.spam_tag_level,
                                spam_tag_level_m: this.params.spam_tag_level_m,
                                spam_tag2_level: this.params.spam_tag2_level,
                                spam_tag2_level_m: this.params.spam_tag2_level_m,
                                spam_tag3_level: this.params.spam_tag3_level,
                                spam_tag3_level_m: this.params.spam_tag3_level_m,
                                spam_kill_level: this.params.spam_kill_level,
                                spam_kill_level_m: this.params.spam_kill_level_m,
                                spam_dsn_cutoff_level: this.params.spam_dsn_cutoff_level,
                                spam_dsn_cutoff_level_m: this.params.spam_dsn_cutoff_level_m,
                                spam_quarantine_cutoff_level: this.params.spam_quarantine_cutoff_level,
                                spam_quarantine_cutoff_level_m: this.params.spam_quarantine_cutoff_level_m,
                                spam_modifies_subject: this.params.spam_modifies_subject,
                                spam_modifies_subject_m: this.params.spam_modifies_subject_m,
                                spam_tag_subject: this.params.spam_tag_subject,
                                spam_tag_subject_m: this.params.spam_tag_subject_m,
                                spam_tag2_subject: this.params.spam_tag2_subject,
                                spam_tag2_subject_m: this.params.spam_tag2_subject_m,
                                spam_tag3_subject_m: this.params.spam_tag3_subject_m,
                                max_message_size: this.params.max_message_size,
                                max_message_size_m: this.params.max_message_size_m,
                                banned_files: this.params.banned_files,
                                banned_files_m: this.params.banned_files_m,
                                sender_whitelist: this.params.sender_whitelist,
                                sender_whitelist_m: this.params.sender_whitelist_m,
                                sender_blacklist: this.params.sender_blacklist,
                                sender_blacklist_m: this.params.sender_blacklist_m,
                                notify_admin_newvirus: this.params.notify_admin_newvirus,
                                notify_admin_newvirus_m: this.params.notify_admin_newvirus_m,
                                notify_admin_virus: this.params.notify_admin_virus,
                                notify_admin_virus_m: this.params.notify_admin_virus_m,
                                notify_admin_spam: this.params.notify_admin_spam,
                                notify_admin_spam_m: this.params.notify_admin_spam_m,
                                notify_admin_banned_file: this.params.notify_admin_banned_file,
                                notify_admin_banned_file_m: this.params.notify_admin_banned_file_m,
                                notify_admin_bad_header: this.params.notify_admin_bad_header,
                                notify_admin_bad_header_m: this.params.notify_admin_bad_header_m,
                                quarantine_virus: this.params.quarantine_virus,
                                quarantine_virus_m: this.params.quarantine_virus_m,
                                quarantine_banned_file: this.params.quarantine_banned_file,
                                quarantine_banned_file_m: this.params.quarantine_banned_file_m,
                                quarantine_bad_header: this.params.quarantine_bad_header,
                                quarantine_bad_header_m: this.params.quarantine_bad_header_m,
                                quarantine_spam: this.params.quarantine_spam,
                                quarantine_spam_m: this.params.quarantine_spam_m,
                                bcc_to: this.params.bcc_to,
                                bcc_to_m: this.params.bcc_to_m,
                                comment: this.params.Comment,
                                disabled: this.params.Disabled,
                            })
                        }
                    )
                        .then(response => {
                            if (!response.ok) {
                                this.showMessage('AmavisRules not saved');
                            }
                            this.showMessage('AmavisRules has been saved successfully.');
                            this.addAmavisRulesModal = false;
                            this.amavisRulesList.push(this.params);
                            this.searchData();

                        });

                },
                async saveList(param) {
                    this.addAmavisRulesModal = true;
                    if (!this.params.PolicyID) {
                        this.showMessage('PolicyID is required.', 'error');
                        return true;
                    }
                    if (!this.params.Name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_virus_checks) {
                        this.showMessage('bypass_virus_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_virus_checks_m) {
                        this.showMessage('bypass_virus_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_banned_checks) {
                        this.showMessage('bypass_banned_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_banned_checks_m) {
                        this.showMessage('bypass_banned_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_spam_checks) {
                        this.showMessage('bypass_spam_checks is required.', 'error');
                        return true;
                    }

                    if (!this.params.bypass_spam_checks_m) {
                        this.showMessage('bypass_spam_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_header_checks) {
                        this.showMessage('bypass_header_checks is required.', 'error');
                        return true;
                    }
                    if (!this.params.bypass_header_checks_m) {
                        this.showMessage('bypass_header_checks_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_level) {
                        this.showMessage('spam_tag_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_level_m) {
                        this.showMessage('spam_tag_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_level) {
                        this.showMessage('spam_tag2_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_level_m) {
                        this.showMessage('spam_tag2_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_level) {
                        this.showMessage('spam_tag3_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_level_m) {
                        this.showMessage('spam_tag3_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_kill_level) {
                        this.showMessage('spam_kill_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_kill_level_m) {
                        this.showMessage('spam_kill_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_dsn_cutoff_level) {
                        this.showMessage('spam_dsn_cutoff_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_dsn_cutoff_level_m) {
                        this.showMessage('spam_dsn_cutoff_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_quarantine_cutoff_level) {
                        this.showMessage('spam_quarantine_cutoff_level is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_quarantine_cutoff_level_m) {
                        this.showMessage('spam_quarantine_cutoff_level_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_modifies_subject) {
                        this.showMessage('spam_modifies_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_modifies_subject_m) {
                        this.showMessage('spam_modifies_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_subject) {
                        this.showMessage('spam_tag_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag_subject_m) {
                        this.showMessage('spam_tag_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_subject) {
                        this.showMessage('spam_tag2_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag2_subject_m) {
                        this.showMessage('spam_tag2_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_subject) {
                        this.showMessage('spam_tag3_subject is required.', 'error');
                        return true;
                    }
                    if (!this.params.spam_tag3_subject_m) {
                        this.showMessage('spam_tag3_subject_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.max_message_size) {
                        this.showMessage('max_message_size is required.', 'error');
                        return true;
                    }
                    if (!this.params.max_message_size_m) {
                        this.showMessage('max_message_size_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.banned_files) {
                        this.showMessage('banned_files is required.', 'error');
                        return true;
                    }
                    if (!this.params.banned_files_m) {
                        this.showMessage('banned_files_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_whitelist) {
                        this.showMessage('sender_whitelist is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_whitelist_m) {
                        this.showMessage('sender_whitelist_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_blacklist) {
                        this.showMessage('sender_blacklist is required.', 'error');
                        return true;
                    }
                    if (!this.params.sender_blacklist_m) {
                        this.showMessage('sender_blacklist_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_newvirus) {
                        this.showMessage('notify_admin_newvirus is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_newvirus_m) {
                        this.showMessage('notify_admin_newvirus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_virus) {
                        this.showMessage('notify_admin_virus is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_virus_m) {
                        this.showMessage('notify_admin_virus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_spam) {
                        this.showMessage('notify_admin_spam is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_spam_m) {
                        this.showMessage('notify_admin_spam_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_banned_file) {
                        this.showMessage('notify_admin_banned_file is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_banned_file_m) {
                        this.showMessage('notify_admin_banned_file_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_bad_header) {
                        this.showMessage('notify_admin_bad_header is required.', 'error');
                        return true;
                    }
                    if (!this.params.notify_admin_bad_header_m) {
                        this.showMessage('notify_admin_bad_header_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_virus) {
                        this.showMessage('quarantine_virus is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_virus_m) {
                        this.showMessage('quarantine_virus_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_banned_file) {
                        this.showMessage('quarantine_banned_file is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_banned_file_m) {
                        this.showMessage('quarantine_banned_file_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_bad_header) {
                        this.showMessage('quarantine_bad_header is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_bad_header_m) {
                        this.showMessage('quarantine_bad_header_m is required.', 'error');
                        return true;
                    }

                    if (!this.params.quarantine_bad_header_m) {
                        this.showMessage('quarantine_bad_header_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_spam) {
                        this.showMessage('quarantine_spam is required.', 'error');
                        return true;
                    }
                    if (!this.params.quarantine_spam_m) {
                        this.showMessage('quarantine_spam_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.bcc_to) {
                        this.showMessage('bcc_to is required.', 'error');
                        return true;
                    }
                    if (!this.params.bcc_to_m) {
                        this.showMessage('bcc_to_m is required.', 'error');
                        return true;
                    }
                    if (!this.params.Comment) {
                        this.showMessage('Comment is required.', 'error');
                        return true;
                    }

                    if (!this.params.Disabled) {
                        this.showMessage('Disabled is required.', 'error');
                        return true;
                    }

                },

                async deleteList(data) {

                    var  isDelete =  confirm("Are you sure you want to delete?");

                    if(isDelete) {
                        var id = data.ID;
                        const url = "{{ route('delete_amavis_rules', ':id') }}".replace(':id', id);
                        await fetch(url,
                            {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': this.token,
                                },
                            }
                        )
                            .then(response => {
                                console.log(response);
                                if (!response.ok) {
                                    this.showMessage('AmavisRules not deleted');
                                }
                                this.amavisRulesList = this.amavisRulesList.filter((d) => d.ID != data.ID);
                                this.searchData();
                                this.showMessage('AmavisRules has been deleted successfully.');
                            });
                    }
                },

                setDisplayType(type) {
                    this.displayType = type;
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                },
            }));
        });
    </script>
</x-layout.default>