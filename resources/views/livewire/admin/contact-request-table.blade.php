<div class="col-12">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault" wire:model="treated"
            wire:change="toggleTreated">
        <label class="form-check-label" for="switchCheckDefault">Include already treated requests</label>
    </div>
    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 10px;">ID</th>
                    <th scope="col" style="width: 20px;">From</th>
                    <th scope="col" style="width: 20px;">Email</th>
                    <th scope="col" style="width: 80px;">Subject</th>
                    <th scope="col" style="width: 20px;">Treated</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contactrequests as $cr)
                    <tr wire:click="selectContact({{ $cr->id }})"
                        class="{{ $selectedId === $cr->id ? 'table-active' : '' }}" style="cursor: pointer;">
                        <th scope="row">{{$cr->id}}</th>
                        <td>{{ $cr->from }}</td>
                        <td>{{ $cr->email }}</td>
                        <td>{{ $cr->subject }}</td>
                        <td>{{ $cr->treated ? 'Yes' : 'No' }}</td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="3">No contact request to treat!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                @if($selectedContact)
                    <div class="modal-header">
                        <h5 class="modal-title">Message from {{ $selectedContact->from }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $selectedContact->message }}</p>
                        <p><strong>Your reply:</strong></p>
                        <textarea class="form-control" rows="4" wire:model.defer="replyMessage"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="sendReply" class="btn btn-success">
                            Send Reply
                        </button>
                        <button wire:click="markAsTreated" class="btn btn-primary">
                            {{ $selectedContact->treated ? 'Mark as Untreated' : 'Mark as Treated' }}
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>