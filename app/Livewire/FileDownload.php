<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FileDownload extends Component
{
	public $files;
	
	protected $listeners = ['refreshFiles' => '$refresh'];
	public function mount()
	{
		$this->files = Storage::disk('local')->files('EM/cemp');
	}
	
	#[On('refreshFiles')]
    public function render()
    {
		
		$this->files = Storage::disk('local')->files('EM/cemp');
		
        return view('livewire.file-download');
    }
	
	public function download($file)
	{
		$filePath = $file; // Path to your file in the storage
		
		if (Storage::exists($filePath)) {
			// Trigger download
			return Storage::download($filePath);
		}
		
		// Optional: Provide a fallback if the file doesn't exist
		session()->flash('error', 'File not found.');
		return redirect()->back();
	}

	
	public function delete($file)
	{
		$filePath = $file; // Path to your file in the storage
		
		if (Storage::exists($filePath)) {
			// Trigger delete
			Storage::delete($filePath);
		}
		
		// Optional: Provide a fallback if the file doesn't exist
		session()->flash('error', 'File not found.');
		return redirect()->back();
	}
}
