<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label">Category:</label>
            <div class="col-sm-10">
                <select wire:model="category_id">
                    <option value="">--Choose--</option>
                    @foreach($categories as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
                <div>
                    @error('category_id') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="question" class="col-sm-2 col-form-label">Question:</label>
            <div class="col-sm-10">
                <textarea wire:model.defer="question" id="question" class="form-control"></textarea>
                <div>
                    @error('question') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="answer" class="col-sm-2 col-form-label">Answer:</label>
            <div class="col-sm-10">
                <textarea wire:model.defer="answer" id="answer" class="form-control"></textarea>
                <div>
                    @error('answer') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    <button wire:click="closeAddModel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
    </form>
</div>
