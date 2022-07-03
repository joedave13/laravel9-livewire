<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if ($update_mode)
    @include('livewire.edit')
    @else
    @include('livewire.create')
    @endif

    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp

            @forelse ($posts as $post)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                    <button wire:click="edit({{ $post->id }})" class="btn btn-warning btn-sm">Edit</button>
                    <button wire:click="destroy({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>