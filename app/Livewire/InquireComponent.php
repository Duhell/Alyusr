<?php

namespace App\Livewire;

use App\Models\Inquire;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class InquireComponent extends Component
{

    use WithFileUploads;

    public $fullName, $contactNo, $email, $companyRegistration, $message;
    public $files=[];

    public function inquire_save(){
        $this->validate([
            'fullName'=> 'required',
            'contactNo'=> 'required',
            'email'=> 'required|email',
            'companyRegistration'=> 'required',
            'message'=> 'required',
        ]);

        $inquiry = new Inquire;
        $fields = [
            'fullName' => $this->fullName,
            'contactNo' => $this->contactNo,
            'email' => $this->email,
            'companyRegistration' => $this->companyRegistration,
            'message' => $this->message
        ];
        foreach ($fields as $field => $value) {
            $inquiry->$field = $value;
        }
        $inquiry->save();

        //$this->reset();
        $this->saveFiles($inquiry);
    }

    private function saveFiles(Inquire $inquiry){
        $this->validate([
           'files.*' => "file|max:1024"
        ]);

        foreach($this->files as $file){
            $file->store('UploadedDocuments','public');
        }

        $this->reset();
        session()->flash('success',"upload success");
    }

    public function render()
    {
        return view('livewire.inquire-component');
    }
}
