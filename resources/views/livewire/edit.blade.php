<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" placeholder="Post title..." wire:model="title">
        @error('title')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" class="form-control" placeholder="Post body..." wire:model="body"></textarea>
        @error('body')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>