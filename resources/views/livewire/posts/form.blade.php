<div class="mb-4">
{{$postId}}

@if(isset($postId) or $add )

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label>العنوان</label>
            <input type="text" class="form-control" wire:model="title">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>المحتوى</label>
            <textarea class="form-control" wire:model="content"></textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" wire.loading class="btn btn-primary">
            {{ $postId ? 'تحديث' : 'إضافة' }}
        </button>
    </form>
    @endif
</div>