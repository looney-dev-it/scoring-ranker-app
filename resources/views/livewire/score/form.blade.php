<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="form-group row">
            <label for="score" class="col-sm-2 col-form-label">Score:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" step="0.01" id="score" wire:model="score" placeholder="0.00">
                <div>
                    @error('score') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="topic_id" class="col-sm-2 col-form-label">Type:</label>
            <div class="col-sm-10">
                <select wire:model="topic_id">
                    <option value="">--Choose--</option>
                    @foreach($scoretopics as $id => $title)
                        <option value="{{$id}}">{{ $title }}</option>
                    @endforeach
                </select>
                <div>
                    @error('topic_id') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    <button wire:click="closeAddModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
    </form>
</div>
