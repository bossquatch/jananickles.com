<div class="flex flex-col space-y-10">
    <div
        x-data="{ uploading: false, progress: 0 }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
        class="my-10 bg-white px-4 pb-4 rounded-md border border-gray-300"
    >
        <div x-show="uploading">
            <p class="mt-4 text-sm font-medium text-gray-400">Upload progress</p>
            <div class="mt-2" aria-hidden="true">
                <div class="overflow-hidden rounded-full bg-gray-200">
                    <div class="h-2 rounded-full bg-indigo-600" x-bind:style="'width: ' + progress + '%;'"></div>
                </div>
            </div>
        </div>


    <form wire:submit="save">
        <div class="p-4 sm:px-6 lg:px-8 bg-white rounded-lg">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold text-gray-900">Comprehensive Emergency Medical Plans</h1>
                    <p class="mt-2 text-sm text-gray-700">Your uploaded files will be listed here. Be sure to <span class="text-indigo-600 font-bold underline decoration-2 uppercase">Save</span> once you have uploaded your files.</p>
                </div>

                @if($errors->any())
                    <div class="my-4 mx-2">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-carnation-500 font-bold uppercase text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <flux:input
                        class=""
                        size="sm"
                        type="file"
                        wire:model="files"
                        multiple
                    />
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
{{--                        class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"--}}
                        @class([
                            'inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8',
                            'border-b-2' => $files,
                        ])
                    >
                        @if($files)
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Size</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">

                                @foreach($files as $key => $file)
                                    @php
                                        $icon = $icons[$file->extension()] ?? $icons['file'];
                                    @endphp
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-lg font-medium text-gray-900 sm:pl-0">{{ $file->getClientOriginalName() }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ formatBytes($file->getSize()) }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><x-tabler icon="{{ $icon['name'] }}" stroke-width="1.5" class="w-10 h-10 {{ $icon['color'] }}" /></td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <x-tabler wire:click="delete('{{ $key }}')" icon="trash" stroke-width="1.5" class="cursor-pointer w-8 h-8 text-red-500" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            @if($files)
                <div class="mt-4">
                    <flux:button size="sm" variant="primary" class="shadow-md mt-4 font-semibold bg-mighty-slate-500 text-mighty-slate-50 hover:bg-mighty-slate-400 hover:text-mighty-slate-200 transition ease-in-out duration-300" wire:click="clearFileList">Clear List</flux:button>
                    <flux:button size="sm" variant="primary" class="shadow-md bg-indigo-600 font-semibold text-white hover:bg-indigo-500 hover:text-gray-200 transition ease-in-out duration-300" type="submit">Save</flux:button>
                </div>
            @endif
        </div>
    </form>
    </div>

</div>