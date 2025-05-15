<div>
<form wire:submit.prevent="save">
<div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" wire:model="name" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" wire:model="email" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    <h4>Sections</h4>
    @foreach($sections as $index => $section)
        <div>
            <input class="form-control" type="text" wire:model="sections.{{ $index }}.title" placeholder="Title">
            <textarea class="form-control" wire:model="sections.{{ $index }}.value" placeholder="Value"></textarea>
            <button type="button" wire:click="removeSection({{ $index }})">Remove</button>
        </div>
    @endforeach
    <button type="button" wire:click="addSection">+ Add Section</button>

    <button type="submit">Save</button>
</form>
</div>
