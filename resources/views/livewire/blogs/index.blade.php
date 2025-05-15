<div>
@if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <button wire:click="edit()" class="btn btn-sm btn-primary">+ add</button>


    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>
                        <button wire:click="edit( {{ $post->id }})" class="btn btn-sm btn-primary">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}


    @if ($showForm)
    <div class="modal d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Post</h5>
                        <button type="button" class="btn-close" wire:click="hideFormModal"></button>
                    </div>
                    <div class="modal-body">
                        <livewire:post-form />
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
