<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Action</th>
        <th scope="col">Topic</th>
        <th scope="col">Score</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($scores as $st)
        <tr>
          <th scope="row">{{$st->id}}</th>
          <td>
            <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$st->id}})">
              O
            </button>
            <button wire:click="delete({{ $st->id }})" class="btn btn-sm btn-danger"
              onclick="return confirm('Are you to delete this Score ?')">
              X
            </button>
          </td>
          <td>{{ $st->topic->title }}</td>
          <td><span class="badge bg-success">{{ $st->score }}</span>{{ $st->topic->unit }}</td>
        </tr>
      @empty
        <tr>
          <th colspan="5">No Scores yet!</th>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-3">
    {{ $scores->links() }}
  </div>
</div>