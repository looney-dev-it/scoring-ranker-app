<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($news as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>Edit/Delete</td>
            <td>{{ $item->message }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="3">No news yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>