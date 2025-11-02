<div>
    <h2>Latest news</h2>
    <ul>
        @foreach ($news as $item)
            <li>{{ $item->title }} - {{ $item->published_at->format('d/m/Y') }}</li>
        @endforeach
    </ul>
</div>