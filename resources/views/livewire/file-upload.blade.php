<div>
    <h1 class="font-nice text-2xl font-bold text-much-ado-800 py-5">Upload your files here</h1>

    <form
        wire:submit.prevent="save"
        envtype="multipart/form-data"
        class="sm:flex sm:items-center"
    >
        <div
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            class="mb-5"
        >
            <div class="flex flex-row justify-center items-center">
                <div>
                    <input type="file" wire:model="file" class="
                       text-sm text-much-ado-800
                       file:mr-5 file:py-1 file:px-3 file:border-[1px] file:border-solid
                       file:text-md file:font-semibold file:rounded-md
                       file:bg-much-ado-500 file:text-much-ado-200
                       hover:file:cursor-pointer hover:file:bg-much-ado-300
                       hover:file:text-much-ado-600 hover:file:font-semibold hover:file:border-1 hover:file:border-much-ado-600"
                    >
                </div>
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                <div class="ml-10 py-4">
                    <button class="bg-much-ado-500 hover:bg-much-ado-300 hover:text-much-ado-600 text-much-ado-200 px-2 rounded"
                        wire:click="save"
                    >
                        Save
                    </button>
                </div>
            </div>

            <div>
{{--            <button type="submit">Save</button>--}}
            </div>

    {{--            @if($photo)--}}
    {{--                <p class="">{{ $photo->temporaryUrl() }}</p>--}}
    {{--            @endif--}}

            <div class="flex flex-col pt-2 text-sm font-bold">
                <div class="text-stone-800">Status:</div>
                <div>@error('file') <span class="error text-carnation-600 font-light">{{ $message }}</span> @enderror</div>
            </div>

        </div>
    </form>
</div>