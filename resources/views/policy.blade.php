<x-layout.default>

    <div x-data="result">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Policies</h2>
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
                            Add Policy
                        </button>

                        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                             :class="addPolicyListModal && '!block'">
                            <div class="flex items-center justify-center min-h-screen px-4"
                                 @click.self="addPolicyListModal = false">
                                <div x-show="addPolicyListModal" x-transition x-transition.duration.300
                                     class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                    <button type="button"
                                            class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                            @click="addPolicyListModal = false">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                        x-text="params.ID ? 'Edit Policy' : 'Add Policy'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="params.ID ? updateList(params) : createList">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" placeholder="Enter Name"
                                                       class="form-input" x-model="params.Name"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="priority">Priority</label>
                                                <input id="priority" type="text" placeholder="Enter Priority"
                                                       class="form-input" x-model="params.Priority"/>
                                            </div>
                                            <div class="mb-5">
                                                <label for="description">Description</label>
                                                <input id="description" type="text" placeholder="Enter Description"
                                                       class="form-input" x-model="params.Description"/>
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
                    <input type="text" placeholder="Search Policy"
                           class="form-input py-2 ltr:pr-11 rtl:pl-11 peer" x-model="searchPolicyList"
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
                            <th>Name</th>
                            <th>Priority</th>
                            <th>Description</th>
                            <th>Disabled</th>
                            <th class="!text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="data in dataList" :key="data.ID">
                            <tr>
                                <td x-text="data.ID"></td>
                                <td>
                                    <div class="flex items-center w-max">
                                        <div x-text="data.Name"></div>
                                    </div>
                                </td>
                                <td x-text="data.Priority"></td>
                                <td x-text="data.Description"></td>
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
                    Name: '',
                    Priority: '',
                    Description: '',
                    Disabled: '',
                },
                displayType: 'list',
                addPolicyListModal: false,
                params: {
                    ID: null,
                    Name: '',
                    Priority: '',
                    Description: '',
                    Disabled: '',
                },
                dataList: [],
                searchPolicyList: '',
                token: '',
                policyLists: @json($result),

                init() {
                    this.searchData();
                    this.getToken();
                },
                async getToken() {
                    var response = await fetch("{{route('token')}}");
                    response.json().then(data => this.token = data.token);
                },
                searchData() {
                    this.dataList = this.policyLists.filter((d) => d.Name.toLowerCase()
                        .includes(this.searchPolicyList.toLowerCase()));
                },

                async editList(data) {
                    this.params = this.defaultParams;
                    if (data) {
                        this.params = JSON.parse(JSON.stringify(data));
                    }

                    this.addPolicyListModal = true;

                },

                async updateList(data) {
                    var id = data.ID;
                    const url = "{{ route('update_policy', ':id') }}".replace(':id', id);

                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "name": this.params.Name,
                                "priority": this.params.Priority,
                                "description": this.params.Description,
                                "disabled": this.params.Disabled
                            })
                        }
                    )
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                this.showMessage('Policy not updated');

                            }
                            this.showMessage('Policy has been updated successfully.');
                            this.addPolicyListModal = false;

                        });
                    this.searchData();
                },

                async createList() {
                    this.addPolicyListModal = true;
                    if (!this.params.Name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.Priority) {
                        this.showMessage('Priority is required.', 'error');
                        return true;
                    }
                    if (!this.params.Description) {
                        this.showMessage('Description is required.', 'error');
                        return true;
                    }
                    if (!this.params.Disabled) {
                        this.showMessage('Disabled is required.', 'error');
                        return true;
                    }



                    const url = "{{ route('create_policy') }}"
                    await fetch(url,
                        {
                            method: 'POST',
                            headers: {
                                'accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.token,
                            },
                            body: JSON.stringify({
                                "name": this.params.Name,
                                "priority": this.params.Priority,
                                "description": this.params.Description,
                                "disabled": this.params.Disabled
                            })
                        }
                    )
                        .then(response => {
                            if (!response.ok) {
                                this.showMessage('Policy not saved');
                            }
                            this.showMessage('Policy has been saved successfully.');
                            this.addPolicyListModal = false;
                            this.policyLists.push(this.params);
                            this.searchData();

                        });

                },
                async saveList(param) {
                    this.addPolicyListModal = true;
                    if (!this.params.Source) {
                        this.showMessage('Helo is required.', 'error');
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
                        const url = "{{ route('delete_policy', ':id') }}".replace(':id', id);
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
                                    this.showMessage('Policy not deleted');
                                }
                                this.policyLists = this.policyLists.filter((d) => d.ID != data.ID);
                                this.searchData();
                                this.showMessage('Policy has been deleted successfully.');
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