<?php
	
	namespace App\Livewire;
	
	use Livewire\Component;
	use Livewire\WithFileUploads;
	use Livewire\Attributes\Validate;
	
	class FileUpload extends Component
	{
		use WithFileUploads;
		
		public $file;

//		protected $rules = [
//			'files' => 'max:51200', // 1MB Max
//		];
		
		public function save()
		{
//			$this->validate();
			$this->validate([
				'file' => 'required|max:80000',
			]);
			$original_filename = $this->file->getClientOriginalName();
			$this->file->storeAs(path: '/EM/cemp', name: $original_filename);
			$this->dispatch('refreshFiles');
		}
		
		public function render()
		{
			return view('livewire.file-upload');
		}
	}