<?php

namespace App\Livewire\Projects;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Models\File;

use Livewire\Component;

class DisplayProjects extends Component
{

    public function projectEdit($slug)
    {
        //dd($slug);
        $this->dispatch('editProject', slug: $slug);
    }

    public function mount()
    {
        // $projects = Project::with('files')->latest()->get();
        // $profile_pic='';
        // foreach($projects as $project){
        //   if($project->files()->exists()){
        //     $profile_pic = File::select('url')->where('fileable_id', $project->id)
        //                         ->where('fileable_type',"App\Models\Project")
        //                         ->where('is_profile', true)
        //                         ->first();
        //     if(!is_null($profile_pic)){
        //     return $profile_pic['url'];
        //     }
        //  }
        // }
    }
    #[On('project-created')]
    public function render()
    {
        $projects = Project::with('files')->latest()->limit(5)->get();

        // foreach($projects as $project){
        //   if($project->files()->exists()){
        //     $profile_pic = File::select('url')->where('fileable_id', $project->id)
        //                         ->where('fileable_type',"App\Models\Project")
        //                         ->where('is_profile', true)
        //                         ->first();
        //     if(!is_null($profile_pic)){
        //     return $profile_pic['url'];
        //     }
        //  }
        // }
        //dd($profile_pic);

        return view('livewire.projects.display-projects')->with(['projects'=>$projects]);
        }
}
