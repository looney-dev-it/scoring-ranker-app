<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createThreadModal">
        <i class="bi bi-plus-circle"></i> New Thread
    </button>

    <div class="modal fade" id="createThreadModal" tabindex="-1" aria-labelledby="createThreadModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createThreadModalLabel">Create a new Thread</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Thread title</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                wire:model.defer="title" placeholder="Enter thread title ...">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Message</label>
                            <textarea id="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                                wire:model.defer="content" placeholder="Write your first message"></textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Create Thread
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', () => {
            var modalEl = document.getElementById('createThreadModal');
            var modal = bootstrap.Modal.getInstance(modalEl);
            if (!modal) {
                modal = new bootstrap.Modal(modalEl);
            }
            modal.hide();
        });
    </script>
</div>