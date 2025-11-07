<div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" style="width: 10px;">ID</th>
        <th scope="col" style="width: 15px;">Action</th>
        <th scope="col" style="width: 20px;">Title</th>
        <th scope="col" style="width: 20px;">Image</th>
        <th scope="col" style="width: 80px;">Content</th>
        <th scope="col" style="width: 20px;">Published</th>
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
              <td class="text-center">
                  @if($news->image_path)
                      <div class="rounded-circle bg-success" style="width: 15px; height: 15px;"></div>
                  @else
                      <div class="rounded-circle bg-danger" style="width: 15px; height: 15px;"></div>
                  @endif
              </td>
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
</div>