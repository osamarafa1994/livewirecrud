<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="save">


            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" wire:model.blur="form.title" wire:dirty.class="border-yellow" class="form-control" 
                >

                @error('form.title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" wire:model.number="form.content"></textarea>
                @error('form.content') <span class="text-danger">{{ $message }}</span> @enderror
                <small>
                    Character count: <span x-text="$wire.form.content.length"></span> 
                </small>
 
            </div>
            <button type="submit"     wire:loading.attr="disabled"
            class="btn btn-success">Save</button>
            <div wire:loading> 
                Saving post...
            </div>

            @if($id)
            <button type="button" class="btn btn-danger" wire:click="delete({{ $id }})">Remove</button>
 
            <div wire:loading wire:target="remove" >  
                Removing post...
            </div>
            @endif
        </form>
    </div>

  
</div>

