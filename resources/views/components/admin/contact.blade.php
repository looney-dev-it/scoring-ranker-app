<x-admin.layout>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">Contact Request</h1>
        </div>
    </div>
    <div class="row">
        <livewire:admin.contact-request-table />
    </div>
    <script>
        window.addEventListener('show-modal', () => {
            var contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
            contactModal.show();
        });
        window.addEventListener('close-modal', () => {
            var modalEl = document.getElementById('contactModal');
            var modal = bootstrap.Modal.getInstance(modalEl);
            if (!modal) {
                modal = new bootstrap.Modal(modalEl);
            }
            modal.hide();
        });
    </script>
</x-admin.layout>