<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Is Published</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($all_news as $news)
        <tr>
            <th scope="row">{{$news->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$news->id}})">
                    O
                </button>
                <button wire:click="delete({{ $news->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this news ?')">
                    X
                </button>
            </td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->content }}</td>
            <td>{{ $news->is_published }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="3">No news yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>