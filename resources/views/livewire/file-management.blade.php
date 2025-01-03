<div class="">
    <h2 class="text-4xl text-blaze-orange-600">Here it is</h2>

    <form wire:submit="save">
        <input type="file" wire:model="photo">

        @error('photo') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save photo</button>
    </form>
</div>