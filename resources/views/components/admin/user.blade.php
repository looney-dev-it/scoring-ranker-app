<x-admin.layout>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">User Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal">
                Add
            </button>
        </div>
        <div class="col-8">
            <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newUserModalLabel">User</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin.user-form />
                        </div>
                    </div>
                </div>
            </div>
            <livewire:admin.user-table :changePasswordOnly="false"/>
        </div>
    </div>
</x-admin.layout>