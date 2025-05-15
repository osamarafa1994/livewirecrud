<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" wire:model.defer="form.title">
                @error('form.title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" wire:model.defer="form.content"></textarea>
                @error('form.content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>