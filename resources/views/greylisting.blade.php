<x-layout.default>
    <div x-data="result">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">GreyListing</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="saveGreyListingList">

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
                            Add GreyListing
                        </button>

                        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                             :class="addGreyListingModal && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                 @click.self="addGreyListingModal = false">
                                <div x-show="addGreyListingModal" x-transition x-transition.duration.300
                                     class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                    <button type="button"
                                            class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                            @click="addGreyListingModal = false">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                        x-text="params.ID ? 'Edit WhiteList' : 'Add WhiteList'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="params.ID ? updateList(params) : createList">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="policyID">PolicyID</label>
                                                <input id="policyID" type="text" placeholder="Enter PolicyID"
                                                       class="form-input" x-model="params.PolicyID"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" placeholder="Enter Name"
                                                       class="form-input" x-model="params.Name"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="useGreylisting">UseGreylisting</label>
                                                <input id="useGreylisting" type="text" placeholder="Enter UseGreylisting"
                                                       class="form-input" x-model="params.UseGreylisting"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="greylistPeriod">GreylistPeriod</label>
                                                <input id="greylistPeriod" type="text" placeholder="Enter GreylistPeriod"
                                                       class="form-input" x-model="params.GreylistPeriod"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="track">Track</label>
                                                <input id="track" type="text" placeholder="Enter Track"
                                                       class="form-input" x-model="params.Track"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="greylistAuthValidity">GreylistAuthValidity</label>
                                                <input id="greylistAuthValidity" type="text" placeholder="Enter GreylistAuthValidity"
                                                       class="form-input" x-model="params.GreylistAuthValidity"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="greylistUnAuthValidity">GreylistUnAuthValidity</label>
                                                <input id="greylistUnAuthValidity" type="text" placeholder="Enter GreylistUnAuthValidity"
                                                       class="form-input" x-model="params.GreylistUnAuthValidity"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="useAutoWhitelist">UseAutoWhitelist</label>
                                                <input id="useAutoWhitelist" type="text" placeholder="Enter UseAutoWhitelist"
                                                       class="form-input" x-model="params.UseAutoWhitelist"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoWhitelistPeriod">AutoWhitelistPeriod</label>
                                                <input id="autoWhitelistPeriod" type="text" placeholder="Enter AutoWhitelistPeriod"
                                                       class="form-input" x-model="params.AutoWhitelistPeriod"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoWhitelistCount">AutoWhitelistCount</label>
                                                <input id="autoWhitelistCount" type="text" placeholder="Enter AutoWhitelistCount"
                                                       class="form-input" x-model="params.AutoWhitelistCount"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoWhitelistCount">AutoWhitelistPercentage</label>
                                                <input id="autoWhitelistCount" type="text" placeholder="Enter AutoWhitelistPercentage"
                                                       class="form-input" x-model="params.AutoWhitelistPercentage"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="useAutoBlackList">UseAutoBlackList</label>
                                                <input id="useAutoBlackList" type="text" placeholder="Enter UseAutoBlackList"
                                                       class="form-input" x-model="params.UseAutoBlackList"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoBlacklistPeriod">AutoBlacklistPeriod</label>
                                                <input id="autoBlacklistPeriod" type="text" placeholder="Enter AutoBlacklistPeriod"
                                                       class="form-input" x-model="params.AutoBlacklistPeriod"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoBlacklistCount">AutoBlacklistCount</label>
                                                <input id="autoBlacklistCount" type="text" placeholder="Enter AutoBlacklistCount"
                                                       class="form-input" x-model="params.AutoBlacklistCount"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="autoBlacklistPercentage">AutoBlacklistPercentage</label>
                                                <input id="autoBlacklistPercentage" type="text" placeholder="Enter AutoBlacklistPercentage"
                                                       class="form-input" x-model="params.AutoBlacklistPercentage"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="comment">Comment</label>
                                                <input id="comment" type="text" placeholder="Enter Comment"
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
                    <input type="text" placeholder="Search GreyListing"
                           class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" x-model="searchGreyListingList"
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
                            <th>ID</th>
                            <th>PolicyID</th>
                            <th>Name</th>
                            <th>UseGreylisting</th>
                            <th>GreyListPeriod</th>
                            <th>Track</th>
                            <th>GreylistAuthValidity</th>
                            <th>GreylistUnAuthValidity</th>
                            <th>UseAutoWhitelist</th>
                            <th>AutoWhitelistPeriod</th>
                            <th>AutoWhitelistCount</th>
                            <th>AutoWhitelistPercentage</th>
                            <th>UseAutoBlacklist</th>
                            <th>AutoBlacklistPeriod</th>
                            <th>AutoBlacklistCount</th>
                            <th>AutoBlacklistPercentage</th>
                            <th>Comment</th>
                            <th>Disabled</th>
                            <th class="!text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="data in dataList" :key="data.ID">
                            <tr>
                                <td>
                                    <div class="flex items-center w-max">
                                        <div x-text="data.ID"></div>
                                    </div>
                                </td>
                                <td x-text="data.PolicyID"></td>
                                <td x-text="data.Name"></td>
                                <td x-text="data.UseGreylisting"></td>
                                <td x-text="data.GreylistPeriod"></td>
                                <td x-text="data.Track"></td>
                                <td x-text="data.GreylistAuthValidity"></td>
                                <td x-text="data.GreylistUnAuthValidity"></td>
                                <td x-text="data.UseAutoWhitelist"></td>
                                <td x-text="data.AutoWhitelistPeriod"></td>
                                <td x-text="data.AutoWhitelistCount"></td>
                                <td x-text="data.AutoWhitelistPercentage"></td>
                                <td x-text="data.UseAutoBlacklist"></td>
                                <td x-text="data.AutoBlacklistPeriod"></td>
                                <td x-text="data.AutoBlacklistCount"></td>
                                <td x-text="data.AutoBlacklistPercentage"></td>
                                <td x-text="data.Comment"></td>
                                <td x-text="data.Disabled"></td>

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
                    Name:'',
                    UseGreylisting:'',
                    GreylistPeriod:'',
                    Track:'',
                    GreylistAuthValidity:'',
                    GreylistUnAuthValidity:'',
                    UseAutoWhitelist:'',
                    AutoWhitelistPeriod:'',
                    AutoWhitelistCount:'',
                    AutoWhitelistPercentage:'',
                    UseAutoBlacklist:'',
                    AutoBlacklistPeriod:'',
                    AutoBlacklistCount:'',
                    AutoBlacklistPercentage:'',
                    Comment: '',
                    Disabled: '',
                },
                displayType: 'list',
                addGreyListingModal: false,
                params: {
                    ID: null,
                    PolicyID: '',
                    Name:'',
                    UseGreylisting:'',
                    GreylistPeriod:'',
                    Track:'',
                    GreylistAuthValidity:'',
                    GreylistUnAuthValidity:'',
                    UseAutoWhitelist:'',
                    AutoWhitelistPeriod:'',
                    AutoWhitelistCount:'',
                    AutoWhitelistPercentage:'',
                    UseAutoBlacklist:'',
                    AutoBlacklistPeriod:'',
                    AutoBlacklistCount:'',
                    AutoBlacklistPercentage:'',
                    Comment: '',
                    Disabled: '',
                },
                dataList: [],
                searchGreyListingList: '',
                token: '',
                greyListingList: @json($result),

                init() {
                    this.searchData();
                    this.getToken();
                },
                async getToken() {
                    var response = await fetch("{{route('token')}}");
                    response.json().then(data => this.token = data.token);
                },
                searchData() {
                    this.dataList = this.greyListingList.filter((d) => d.Name.toLowerCase()
                        .includes(this.searchGreyListingList.toLowerCase()));
                },

                async editList(data) {
                    this.params = this.defaultParams;
                    if (data) {
                        this.params = JSON.parse(JSON.stringify(data));
                    }

                    this.addGreyListingModal = true;

                },

                async updateList(data) {
                    var id = data.ID;
                    const url = "{{ route('update_grey_listing', ':id') }}".replace(':id', id);

                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "policy_id": data.PolicyID,
                                "name": data.Name,
                                "use_grey_listing": data.UseGreylisting,
                                "grey_list_period": data.GreylistPeriod,
                                "track" : data.Track,
                                "grey_list_auth_validity" : data.GreylistAuthValidity,
                                "grey_list_un_auth_validity" : data.GreylistUnAuthValidity,
                                "use_auto_white_list" : data.UseAutoWhitelist,
                                "auto_white_list_period" : data.AutoWhitelistPeriod,
                                "auto_white_list_count" : data.AutoWhitelistCount,
                                "auto_white_list_percentage" : data.AutoWhitelistPercentage,
                                "use_auto_black_list" : data.UseAutoBlacklist,
                                "auto_black_list_period" : data.AutoBlacklistPeriod,
                                "auto_black_list_count" : data.AutoBlacklistCount,
                                "auto_black_list_percentage" : data.AutoBlacklistPercentage,
                                "comment": data.Comment,
                                "disabled": data.Disabled,
                            })
                        }
                    )
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                this.showMessage('GreyListingList Member not updated');

                            }
                            this.showMessage('GreyListingList has been updated successfully.');
                            this.addGreyListingModal = false;

                        });
                    this.searchData();
                },

                async createList() {
                    this.addGreyListingModal = true;
                    if (!this.params.PolicyID) {
                        this.showMessage('PolicyID is required.', 'error');
                        return true;
                    }
                    if (!this.params.Name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseGreylisting) {
                        this.showMessage('UseGreylisting is required.', 'error');
                        return true;
                    }
                    if (!this.params.GreylistPeriod) {
                        this.showMessage('GreylistPeriod is required.', 'error');
                        return true;
                    }

                    if (!this.params.Track) {
                        this.showMessage('Track is required.', 'error');
                        return true;
                    }
                    if (!this.params.GreylistAuthValidity) {
                        this.showMessage('GreylistAuthValidity is required.', 'error');
                        return true;
                    }

                    if (!this.params.GreylistUnAuthValidity) {
                        this.showMessage('GreylistUnAuthValidity is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseAutoWhitelist) {
                        this.showMessage('UseAutoWhitelist is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoWhitelistPeriod) {
                        this.showMessage('AutoWhitelistPeriod is required.', 'error');
                        return true;
                    }

                    if (!this.params.AutoWhitelistCount) {
                        this.showMessage('AutoWhitelistCount is required.', 'error');
                        return true;
                    }

                    if (!this.params.AutoWhitelistPercentage) {
                        this.showMessage('AutoWhitelistPercentage is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseAutoBlacklist) {
                        this.showMessage('UseAutoBlacklist is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistPeriod) {
                        this.showMessage('AutoBlacklistPeriod is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistCount) {
                        this.showMessage('AutoBlacklistCount is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistPercentage) {
                        this.showMessage('AutoBlacklistPercentage is required.', 'error');
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

                    const url = "{{ route('create_grey_listing') }}"
                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "policy_id": this.params.PolicyID,
                                "name": this.params.Name,
                                "use_grey_listing": this.params.UseGreylisting,
                                "grey_list_period": this.params.GreylistPeriod,
                                "track" : this.params.Track,
                                "grey_list_auth_validity" : this.params.GreylistAuthValidity,
                                "grey_list_un_auth_validity" : this.params.GreylistUnAuthValidity,
                                "use_auto_white_list" : this.params.UseAutoWhitelist,
                                "auto_white_list_period" : this.params.AutoWhitelistPeriod,
                                "auto_white_list_count" : this.params.AutoWhitelistCount,
                                "auto_white_list_percentage" : this.params.AutoWhitelistPercentage,
                                "use_auto_black_list" : this.params.UseAutoBlacklist,
                                "auto_black_list_period" : this.params.AutoBlacklistPeriod,
                                "auto_black_list_count" : this.params.AutoBlacklistCount,
                                "auto_black_list_percentage" : this.params.AutoBlacklistPercentage,
                                "comment": this.params.Comment,
                                "disabled": this.params.Disabled,
                            })
                        }
                    )
                        .then(response => {
                            if (!response.ok) {
                                this.showMessage('GreyListingList not saved');
                            }
                            this.showMessage('GreyListingList has been saved successfully.');
                            this.addGreyListingModal = false;
                            this.greyListingList.push(this.params);
                            this.searchData();

                        });

                },
                async saveGreyListingList() {
                    this.addGreyListingModal = true;
                    if (!this.params.PolicyID) {
                        this.showMessage('PolicyID is required.', 'error');
                        return true;
                    }
                    if (!this.params.Name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseGreylisting) {
                        this.showMessage('UseGreylisting is required.', 'error');
                        return true;
                    }
                    if (!this.params.GreylistPeriod) {
                        this.showMessage('GreylistPeriod is required.', 'error');
                        return true;
                    }

                    if (!this.params.Track) {
                        this.showMessage('Track is required.', 'error');
                        return true;
                    }
                    if (!this.params.GreylistAuthValidity) {
                        this.showMessage('GreylistAuthValidity is required.', 'error');
                        return true;
                    }

                    if (!this.params.GreylistUnAuthValidity) {
                        this.showMessage('GreylistUnAuthValidity is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseAutoWhitelist) {
                        this.showMessage('UseAutoWhitelist is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoWhitelistPeriod) {
                        this.showMessage('AutoWhitelistPeriod is required.', 'error');
                        return true;
                    }

                    if (!this.params.AutoWhitelistCount) {
                        this.showMessage('AutoWhitelistCount is required.', 'error');
                        return true;
                    }

                    if (!this.params.AutoWhitelistPercentage) {
                        this.showMessage('AutoWhitelistPercentage is required.', 'error');
                        return true;
                    }
                    if (!this.params.UseAutoBlacklist) {
                        this.showMessage('UseAutoBlacklist is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistPeriod) {
                        this.showMessage('AutoBlacklistPeriod is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistCount) {
                        this.showMessage('AutoBlacklistCount is required.', 'error');
                        return true;
                    }
                    if (!this.params.AutoBlacklistPercentage) {
                        this.showMessage('AutoBlacklistPercentage is required.', 'error');
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
                    var isDelete = confirm("Are you sure you want to delete?");
                    if (isDelete) {
                        var id = data.ID;
                        const url = "{{ route('delete_grey_listing', ':id') }}".replace(':id', id);
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
                                    this.showMessage('GreyListingList not deleted');
                                }
                                this.greyListingList = this.greyListingList.filter((d) => d.ID !== data.ID);
                                this.searchData();
                                this.showMessage('GreyListingList has been deleted successfully.');
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
