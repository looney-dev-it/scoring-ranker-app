<x-layout>
   <x-slot:title>
        Admin
    </x-slot:title>
    
<div class="container">
    <div class="row mt-6 mb-6">
        <div class="col-2">
            User Management
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal">
                Add
            </button>
            <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newUserModalLabel">User</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin-user-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9" style="height:200px;">
            <livewire:admin-user-table />   
        </div>
    </div>
    <div class="row border-top mt-6 mb-6"></div>
    <div class="row mt-6 mb-6">
        <div class="col-2">
            News Management
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newNewsModal">
                Add
            </button>
            <div class="modal fade" id="newNewsModal" tabindex="-1" aria-labelledby="newNewsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newNewsModalLabel">News</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin-news-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9" style="height:200px;">
            <livewire:admin-news-table />
        </div>
    </div>
    <div class="row border-top mt-6 mb-6"></div>
</div>
<script>
    window.addEventListener('userSubmitted', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('newUserModal'));
        if (modal) modal.hide();
    });
    window.addEventListener('openUserModal', () => {
        const modal = new bootstrap.Modal(document.getElementById('newUserModal'));
        modal.show();
    });
    window.addEventListener('newsSubmitted', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('newNewsModal'));
        if (modal) modal.hide();
    });
    window.addEventListener('openNewsModal', () => {
        const modal = new bootstrap.Modal(document.getElementById('newNewsModal'));
        modal.show();
    });
</script>
</x-layout>