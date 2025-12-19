<x-admin.layout>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">ScoreTypes Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newScoreTypeModal">
                Add
            </button>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="newScoreTypeModal" tabindex="-1" aria-labelledby="nnewScoreTypeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newScoreTypeModal">Score Type</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin.score-type-form />
                        </div>
                    </div>
                </div>
            </div>
            <livewire:admin.score-type-table />
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h1 class="h4">ScoreTopics Management</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newScoreTopicModal">
                Add
            </button>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="newScoreTopicModal" tabindex="-1" aria-labelledby="newScoreTopicModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newScoreTopicModal">News</h5>
                        </div>
                        <div class="modal-body">
                            <livewire:admin.score-topic-form />
                        </div>
                    </div>
                </div>
            </div>
            <livewire:admin.score-topic-table />
        </div>
    </div>
</x-admin.layout>