<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadComponent extends Component
{
    use WithFileUploads;

    public $file;

    public function upload()
    {
        $this->validate([
            'file' => 'required|image|max:1024', // Adjust validation rules as needed
        ]);

        // Store the file
        $this->file->store('uploads/images');
    }

    public function render()
    {
        return view('livewire.file-upload-component');
    }
}
