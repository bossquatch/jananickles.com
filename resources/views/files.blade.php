<x-app-layout>
    <div class="flex justify-between items-center bg-gradient-to-r from-sky-300 from-10% via-sky-200 via-30% to-mighty-slate-300 to-90% my-4 p-8 rounded-t-lg">
        <div>
            <img src="{{URL::asset('/images/EMLogo.png')}}" height="100" width="100">
        </div>
        <div class="text-sky-800 text-3xl font-title font-bold">
            Upload your Comprehensive Emergency Medical Plans
        </div>
        <div>
            <img src="{{URL::asset('/images/polk-county-logo.png')}}" height="100" width="100">
        </div>
    </div>

    <div class="flex flex-col mt-8 space-y-10">
        <div class="py-2 px-5 bg-gray-200 rounded-md border-4 border-sky-500">
            <livewire:file-upload />
        </div>
        <div class="py-5 px-5 bg-gray-200 rounded-md border-4 border-lime-500">
            <livewire:file-download />
        </div>
    </div>
</x-app-layout>