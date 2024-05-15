<x-layout.default>
    <div x-data="result">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">GreyListing Tracking</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="saveGreyListingTrackingList">

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
                            Add GreyListingTracking
                        </button>

                        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                             :class="addGreyListingTrackingListModal && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                 @click.self="addGreyListingTrackingListModal = false">
                                <div x-show="addGreyListingTrackingListModal" x-transition x-transition.duration.300
                                     class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                    <button type="button"
                                            class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                            @click="addGreyListingTrackingListModal = false">

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
                                                <label for="trackKey">TrackKey</label>
                                                <input id="trackKey" type="text" placeholder="Enter TrackKey"
                                                       class="form-input" x-model="params.TrackKey"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="sender">Sender</label>
                                                <input id="sender" type="text" placeholder="Enter Sender"
                                                       class="form-input" x-model="params.Sender"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="recipient">Recipient</label>
                                                <input id="recipient" type="text" placeholder="Enter Recipient"
                                                       class="form-input" x-model="params.Recipient"/>
                                            </div>

                                            <div class="mb-5">
                                                <label for="firstSeen">FirstSeen</label>
                                                <input id="firstSeen" type="text" placeholder="Enter FirstSeen"
                                                       class="form-input" x-model="params.FirstSeen"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="lastUpdate">LastUpdate</label>
                                                <input id="lastUpdate" type="text" placeholder="Enter LastUpdate"
                                                       class="form-input" x-model="params.LastUpdate"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="tries">Tries</label>
                                                <input id="tries" type="text" placeholder="Enter Tries"
                                                       class="form-input" x-model="params.Tries"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="count">Count</label>
                                                <input id="count" type="text" placeholder="Enter Count"
                                                       class="form-input" x-model="params.Count"/>
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
                    <input type="text" placeholder="Search GreyListingTracking"
                           class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" x-model="searchGreyListingTrackingList"
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
                            <th>TrackKey</th>
                            <th>Sender</th>
                            <th>Recipient</th>
                            <th>FirstSeen</th>
                            <th>LastUpdate</th>
                            <th>Tries</th>
                            <th>Count</th>
                            <th class="!text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="data in dataList" :key="data.ID">
                            <tr>
                                <td>
                                    <div class="flex items-center w-max">
                                        <div x-text="data.TrackKey"></div>
                                    </div>
                                </td>
                                <td x-text="data.Sender"></td>
                                <td x-text="data.Recipient"></td>
                                <td x-text="data.FirstSeen"></td>
                                <td x-text="data.LastUpdate"></td>
                                <td x-text="data.Tries"></td>
                                <td x-text="data.Count"></td>
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
                    TrackKey: '',
                    Sender: '',
                    Recipient: '',
                    FirstSeen: '',
                    LastUpdate: '',
                    Tries: '',
                    Count: '',
                },
                displayType: 'list',
                addGreyListingTrackingListModal: false,
                params: {
                    ID: null,
                    TrackKey: '',
                    Sender: '',
                    Recipient: '',
                    FirstSeen: '',
                    LastUpdate: '',
                    Tries: '',
                    Count: '',
                },
                dataList: [],
                searchGreyListingTrackingList: '',
                token: '',
                greyListingTrackingList: @json($result),

                init() {
                    this.searchData();
                    this.getToken();
                },
                async getToken() {
                    var response = await fetch("{{route('token')}}");
                    response.json().then(data => this.token = data.token);
                },
                searchData() {
                    this.dataList = this.greyListingTrackingList.filter((d) => d.TrackKey.toLowerCase()
                        .includes(this.searchGreyListingTrackingList.toLowerCase()));
                },

                async editList(data) {
                    this.params = this.defaultParams;
                    if (data) {
                        this.params = JSON.parse(JSON.stringify(data));
                    }

                    this.addGreyListingTrackingListModal = true;

                },

                async updateList(data) {
                    var id = data.ID;
                    const url = "{{ route('update_grey_listing_tracking', ':id') }}".replace(':id', id);

                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "track_key": data.TrackKey,
                                "sender": data.Sender,
                                "recipient": data.Recipient,
                                "first_seen": data.FirstSeen,
                                "last_update": data.LastUpdate,
                                "tries": data.Tries,
                                "count": data.Count,
                            })
                        }
                    )
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                this.showMessage('GreyListingTrackingList Member not updated');

                            }
                            this.showMessage('GreyListingTrackingList has been updated successfully.');
                            this.addGreyListingTrackingListModal = false;

                        });
                    this.searchData();
                },

                async createList() {
                    this.addGreyListingTrackingListModal = true;
                    if (!this.params.TrackKey) {
                        this.showMessage('TrackKey is required.', 'error');
                        return true;
                    }

                    if (!this.params.Sender) {
                        this.showMessage('Sender is required.', 'error');
                        return true;
                    }
                    if (!this.params.Recipient) {
                        this.showMessage('Recipient is required.', 'error');
                        return true;
                    }

                    if (!this.params.FirstSeen) {
                        this.showMessage('FirstSeen is required.', 'error');
                        return true;
                    }
                    if (!this.params.LastUpdate) {
                        this.showMessage('LastUpdate is required.', 'error');
                        return true;
                    }
                    if (!this.params.Tries) {
                        this.showMessage('Tries is required.', 'error');
                        return true;
                    }
                    if (!this.params.Count) {
                        this.showMessage('Count is required.', 'error');
                        return true;
                    }

                    const url = "{{ route('create_grey_listing_tracking') }}"
                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "track_key": this.params.TrackKey,
                                "sender": this.params.Sender,
                                "recipient": this.params.Recipient,
                                "first_seen": this.params.FirstSeen,
                                "last_update": this.params.LastUpdate,
                                "tries": this.params.Tries,
                                "count": this.params.Count,
                            })
                        }
                    )
                        .then(response => {
                            if (!response.ok) {
                                this.showMessage('GreyListingTrackingList not saved');
                            }
                            this.showMessage('GreyListingTrackingList has been saved successfully.');
                            this.addGreyListingTrackingListModal = false;
                            this.greyListingTrackingList.push(this.params);
                            this.searchData();

                        });

                },
                async saveGreyListingTrackingList() {
                    this.addGreyListingTrackingListModal = true;
                    if (!this.params.TrackKey) {
                        this.showMessage('TrackKey is required.', 'error');
                        return true;
                    }

                    if (!this.params.Sender) {
                        this.showMessage('Sender is required.', 'error');
                        return true;
                    }
                    if (!this.params.Recipient) {
                        this.showMessage('Recipient is required.', 'error');
                        return true;
                    }

                    if (!this.params.FirstSeen) {
                        this.showMessage('FirstSeen is required.', 'error');
                        return true;
                    }
                    if (!this.params.LastUpdate) {
                        this.showMessage('LastUpdate is required.', 'error');
                        return true;
                    }
                    if (!this.params.Tries) {
                        this.showMessage('Tries is required.', 'error');
                        return true;
                    }
                    if (!this.params.Count) {
                        this.showMessage('Count is required.', 'error');
                        return true;
                    }

                },

                async deleteList(data) {
                    var isDelete = confirm("Are you sure you want to delete?");
                    if (isDelete) {
                        var id = data.ID;
                        const url = "{{ route('delete_grey_listing_tracking', ':id') }}".replace(':id', id);
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
                                    this.showMessage('GreyListingTrackingList not deleted');
                                }
                                this.greyListingTrackingList = this.greyListingTrackingList.filter((d) => d.ID !== data.ID);
                                this.searchData();
                                this.showMessage('GreyListingTrackingList has been deleted successfully.');
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
