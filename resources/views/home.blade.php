<x-layout>
    <div class="row">
        <div class="col-8">
            <livewire:score.latest-scores />
        </div>
        <div class="col-4">
            <livewire:news.latest-news />
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <x-forum-latest :threads="$threads" />
        </div>
    </div>
</x-layout>