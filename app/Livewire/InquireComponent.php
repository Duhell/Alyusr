<?php

namespace App\Livewire;

use App\Models\Inquire;
use Livewire\Component;
use Livewire\WithFileUploads;
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
            'message' => $this->message,
        ];
        foreach ($fields as $field => $value) {
            $inquiry->$field = $value;
        }
        $inquiry->save();

        $this->saveFiles($inquiry);
    }

    private function saveFiles(Inquire $inquiry){
        $this->validate([
           'files.*' => "file|max:1024"
        ]);
        // Create a new folder
        $FolderName = str_replace(' ','',$inquiry->fullName)  . '_' . date('F-d-Y');

        foreach($this->files as $field => $file){
            $FileName  = str_replace(' ','',$inquiry->fullName) . "_" . date("F-d-Y") . '_'. $file->getClientOriginalName();
            $FilePath = $file->storeAs('UploadedInquiryDocuments/'.$FolderName,$FileName,'public');
            $inquiry->$field = $FilePath;
        }
        $inquiry->save();
        $this->reset();
        session()->flash('success',"Form submitted!");
    }

    public function render()
    {
        return view('livewire.inquire-component');
    }
}
