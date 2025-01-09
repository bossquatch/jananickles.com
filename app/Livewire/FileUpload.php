<?php
	
	namespace App\Livewire;
	
	use Illuminate\Support\Arr;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\Form;
	use Livewire\WithFileUploads;
	use Livewire\Attributes\Validate;
	
	class FileUpload extends Component
	{
		use WithFileUploads;
		
		public $icons = [
			'pdf' => [
				'name' => 'file-type-pdf',
				'color' => 'text-carnation-400',
			],
			'doc' => [
				'name' => 'file-type-doc',
				'color' => 'text-blue-400',
			],
			'docx' => [
				'name' => 'file-type-docx',
				'color' => 'text-blue-400',
			],
			'xls' => [
				'name' => 'file-type-xls',
				'color' => 'text-green-600',
			],
			'xlsx' => [
				'name' => 'file-type-xls',
				'color' => 'text-green-600',
			],
			'zip' => [
				'name' => 'file-type-zip',
				'color' => 'text-bleached-cedar-400',
			],
			'gz' => [
				'name' => 'file-type-zip',
				'color' => 'text-bleached-cedar-400',
			],
			'file' => [
				'name' => 'file',
				'color' => 'text-gray-500',
			],
		];
		
		#[Validate([
			'files.*' => 'max:89120|extensions:pdf,doc,docx,xls,xlsx,zip,gz,mp4'
		], message: [
			'files.*.max' => 'File size too large. Max size is 80MB',
			'files.*.extensions' => 'Invalid file type. Valid file types are: pdf, doc, docx, xls, xlsx, zip, gz'
		]
		)]
		public $files = [];
		public $fileFeedback = [];
		public $filePath = '';
	
		public function mount()
		{
			$this->filePath = config('filesystems.folders.cemp');
		}
		
//		public function updated()
//		{
//			$this->resetErrorBag();
//			$this->resetValidation();
//		}
		
		public function save()
		{
			$this->validate();
			foreach ($this->files as $file) {
				$original_filename = $file->getClientOriginalName();
				$file->storeAs(path: $this->filePath, name: $original_filename);
			}
			
			$this->clearFileList();
			$this->dispatch('refreshFiles');
			
		}
		
		public function clearFileList()
		{
			$this->files = [];
			$this->resetErrorBag();
			$this->resetValidation();
		}
		
		public function delete($key)
		{
			Arr::pull($this->files, $key);
		}
		
		#[On('refreshFiles')]
		public function render()
		{
			return view('livewire.file-upload');
		}
	}