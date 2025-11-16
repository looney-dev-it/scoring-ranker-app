<div class="card mt-4">
    <div class="card-header">Add a comment</div>
    <div class="card-body">
        <form wire:submit.prevent="submit">
            @csrf
            <div class="mb-3">
                <textarea wire:model="content" name="content" class="form-control" rows="4"
                    placeholder="Your comment ..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post your comment</button>
        </form>
    </div>
</div>