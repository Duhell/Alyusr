<?php

namespace App\Livewire;

use App\Models\JobTitle;
use Livewire\Component;

class JobsPage extends Component
{

    public function render()
    {
        $jobs = JobTitle::with('jobDescriptions')->get();
        return view('livewire.jobs-page',compact('jobs'));
    }
}
