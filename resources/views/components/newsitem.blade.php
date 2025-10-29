<div class="card bg-base-100 shadow">
    <div class="card-body">
            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">{{ $news->user ? $news->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $news->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <p class="mt-1">{{ $news->message }}</p>
            </div>
        </div>
    </div>
</div>