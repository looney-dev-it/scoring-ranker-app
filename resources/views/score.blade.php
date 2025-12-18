<x-layout>
    <x-slot:title>
        Scores
    </x-slot:title>

    <div class="row">
        <div class="col-6">
            <h5>Scoring Topics</h5>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($scoretopics as $item)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{$item->title}}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{$item->title}}" type="button" role="tab"
                            aria-controls="{{$item->title}}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{$item->title}}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($scoretopics as $item)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$item->title}}" role="tabpanel"
                        aria-labelledby="{{$item->title}}-tab">
                        <livewire:score.score-table :filter="$item->id" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-6">
            <h4>Latest Scores ...</h4>
            <livewire:score.latest-scores />
        </div>
    </div>
    @auth
        <div class="row">
            <div class="col-6">
                <h5>My Scores</h5>
                <livewire:score.my-score-table />
            </div>
            <div class="col-6">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newScoreModal">
                    Add
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="modal fade" id="newScoreModal" tabindex="-1" aria-labelledby="newScoreModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newScoreModal">Score</h5>
                                </div>
                                <div class="modal-body">
                                    <livewire:score.form />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <h2>Please sign in or register to be able to post scores</h2>
        </div>
    @endauth
    <script>
        window.addEventListener('openScoreModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('newScoreModal'));
            modal.show();
        });
    </script>
</x-layout>