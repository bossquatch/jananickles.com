<div>
    @if(empty($files))
        <div class="p-4">There are no files</div>
    @else
        @foreach($files as $file)
            <div class="flex flex-row justify-between items-center py-2 px-5">
                <div class="flex flex-row items-center space-x-4">
                    <div class="ml-5 text-much-ado-800 font-bold text-lg">
                        <button class="bg-much-ado-500 hover:bg-much-ado-300 hover:text-much-ado-600 text-much-ado-200 px-2 rounded" type="button" wire:click="download('{{ $file }}')">Download</button>
                    </div>
                    <div class="ml-5 text-much-ado-800 font-bold text-lg">
                        <button class="bg-carnation-500 hover:bg-carnation-300 hover:text-carnation-600 text-carnation-200 px-2 rounded" type="button" wire:click="delete('{{ $file }}')">Delete</button>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div>{{ basename($file) }}</div>
                        <div>{{ Carbon\Carbon::createFromTimestamp(Storage::lastModified($file))->toDayDateTimeString() }}</div>
                        <div></div>
                    </div>
                </div>
                <div>
    {{--                <button class="bg-much-ado-500 hover:bg-much-ado-300 hover:text-much-ado-600 text-much-ado-200 px-2 rounded" wire:click="delete({{ $file->id }})">Delete</button>--}}
                </div>
            </div>
        @endforeach
    @endif
</div>
