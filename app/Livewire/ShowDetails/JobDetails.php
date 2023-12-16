<?php

namespace App\Livewire\ShowDetails;

use App\Models\JobTitle;
use Livewire\Component;

class JobDetails extends Component
{
    public $job_id;

    public function mount($job_id){
        $this->job_id = $job_id;
    }
    public function render()
    {
        return view('livewire.show-details.job-details')->with([
            'data'=> JobTitle::where('id',$this->job_id)->get()
        ]);
    }
}
