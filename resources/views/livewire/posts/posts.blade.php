<div>
<button class="btn btn-primary mb-3" wire:click="toggleForm">
        {{ $showForm ? 'Cancel' : 'Add Post' }}
    </button>
    @if (!$showForm)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>العنوان</th>
            <th>المحتوى</th>
            <th>التحكم</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                <button class="btn btn-sm btn-info" wire:click="edit({{ $post->id }})">تعديل</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<livewire:posts.form />
@endif
</div>
