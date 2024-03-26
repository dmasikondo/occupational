<?php

namespace App\Livewire\Projects;
use App\Models\Project;
use Livewire\Attributes\On;

use Livewire\Component;

class DisplayProjects extends Component
{

    public function projectEdit($slug)
    {
        //dd($slug);
        $this->dispatch('editProject', slug: $slug);
    }

    #[On('project-created')]
    public function render()
    {
        $projects = Project::latest()->get();
        return view('livewire.projects.display-projects')->with(['projects'=>$projects]);
    }
}
