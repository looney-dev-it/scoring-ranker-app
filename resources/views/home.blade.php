<x-layout>
    <div class="row">
        <div class="col-8">
            <x-latest-scores :scores="$latestScores" /> 
        </div>
        <div class="col-4">
            <x-latest-news :news="$latestNews" /> 
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h2>Here forum part ?!</h2>
        </div>
        <div class="col-6">
            <h2>I don't know ...</h2>
        </div>
    </div>
</x-layout>