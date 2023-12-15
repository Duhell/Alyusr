<?php

namespace App\Livewire;

use App\Models\Inquire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Stevebauman\Location\Facades\Location;
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
        $location = Location::get();

        $inquiry = new Inquire;
        $fields = [
            'fullName' => $this->fullName,
            'contactNo' => $this->contactNo,
            'email' => $this->email,
            'companyRegistration' => $this->companyRegistration,
            'message' => $this->message,
            'address' => $location->countryName . '|'. $location->cityName
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
        $FolderName = $inquiry->fullName . '_' . date('F-d-Y');

        foreach($this->files as $field => $file){
            $FileName  = $inquiry->fullName . "_" . $file->getClientOriginalName() . "_" . date("F-d-Y");
            $FilePath = $file->storeAs('UploadedInquiryDocuments/'.$FolderName,$FileName,'public');
            $inquiry->$field = $FilePath;
        }
        $inquiry->save();
        $this->reset();
        session()->flash('success',"upload success");
    }

    public function render()
    {
        return view('livewire.inquire-component');
    }
}
