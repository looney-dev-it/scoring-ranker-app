<x-admin.layout>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">Categories Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCategoryModal">
                Add
            </button>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="newCategoryModal" tabindex="-1" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newCategoryModal">Category</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin.category-form />
                        </div>
                    </div>
                </div>
            </div>
            <livewire:admin.category-table />
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">Questions Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newQuestionModal">
                Add
            </button>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="newQuestionModal" tabindex="-1" aria-labelledby="newQuestionModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newQuestionModal">News</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin.question-form />
                        </div>
                    </div>
                </div>
            </div>
            <livewire:admin.question-table />
        </div>
    </div>
    <script>

        window.addEventListener('questionSubmitted', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('newQuestionModal'));
            if (modal) modal.hide();
        });
        window.addEventListener('openQuestionModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('newQuestionModal'));
            modal.show();
        });

        window.addEventListener('categorySubmitted', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('newCategoryModal'));
            if (modal) modal.hide();
        });
        window.addEventListener('openCategoryModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('newCategoryModal'));
            modal.show();
        });
    </script>
</x-admin.layout>