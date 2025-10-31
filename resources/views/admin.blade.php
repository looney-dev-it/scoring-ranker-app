<x-layout>
   <x-slot:title>
        Admin
    </x-slot:title>
    
<div class="container">
  <div class="row border-top mt-6 mb-6">
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
                <h5 class="modal-title" id="newUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <livewire:admin-user-newform />
            </div>
            </div>
        </div>
    </div>
    </div>
        <div class="col-9">
            <livewire:admin-user-table />   
        </div>
  </div>
</div>
</div>
<script>
    window.addEventListener('userSubmitted', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('newUserModal'));
        if (modal) modal.hide();
    });
</script>
</x-layout>