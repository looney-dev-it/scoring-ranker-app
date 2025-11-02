<x-admin.layout>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">News Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newNewsModal">
                Add
            </button>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row">
        <div class="col-12">
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
            <livewire:admin-news-table />
        </div>
    </div>
    <script>
        window.addEventListener('newsSubmitted', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('newNewsModal'));
            if (modal) modal.hide();
        });
        window.addEventListener('openNewsModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('newNewsModal'));
            modal.show();
        });
    </script>
</x-admin.layout>