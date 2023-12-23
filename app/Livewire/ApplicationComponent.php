<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Application;
use App\Models\JobTitle;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
class ApplicationComponent extends Component
{
    use WithFileUploads;

    public $FirstName,$MiddleName,$LastName,$AppliedJob,$PhoneNumber,$Email,$FileResume,$CoverLetter;

    public function SaveApplication(){
        try{
            $this->validate([
                'FirstName'=>'required|max:255',
                'MiddleName'=>'required|max:255',
                'LastName' =>'required|max:255',
                'AppliedJob' =>'required',
                'PhoneNumber' =>'required|max:255',
                'Email'=> 'required|email',
                'FileResume'=>'required|file|max:1024',
                'CoverLetter'=>'required'
            ]);
            $FileName = $this->LastName . $this->MiddleName . $this->FirstName."_".date("F-d-Y").$this->FileResume->getClientOriginalExtension();
            $FolderName = 'UploadedApplicationDocuments/'.$this->LastName . $this->FirstName."_".date("F-d-Y");

            File::makeDirectory(storage_path('app/public/'. $FolderName),0755,true,true);
            $ResumeFilePath = $this->FileResume->storeAs($FolderName, $FileName, 'public');
            chmod($ResumeFilePath,0755);
            $application = new Application;

            $fields = [
                'FirstName' => $this->FirstName,
                'MiddleName' => $this->MiddleName,
                'LastName' => $this->LastName,
                'AppliedJob' => $this->AppliedJob,
                'PhoneNumber' => $this->PhoneNumber,
                'Email' => $this->Email,
                'FileResume' => $ResumeFilePath,
                'CoverLetter' => $this->CoverLetter,
            ];

            foreach ($fields as $field => $value) {
                $application->$field = $value;
            }

            $application->save();
            $this->reset();
            session()->flash('success',"Form Submitted!");

        }catch(Exception $err){
            return redirect()->back()->withErrors(['errors'=>$err->getMessage()]);
        }
    }
    public function render()
    {
        return view('livewire.application-component')->with([
            'jobsAvail'=>JobTitle::all()
        ]);
    }
}
