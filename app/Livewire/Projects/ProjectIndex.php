<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Project;
use App\Models\File;


class ProjectIndex extends Component
{
    #[Computed]
    public function projects()
    {
        //dd($this->slug);
        $projectz = Project::with('files')->latest()->get();
        return $projectz;
    }


    public function render()
    {
        return view('livewire.projects.project-index');
    }
}
