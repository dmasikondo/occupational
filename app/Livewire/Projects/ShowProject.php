<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use App\Models\Project;
use App\Models\File;


class ShowProject extends Component
{
    // #[Locked]
    public $slug;


    #[Computed]
    public function project()
    {
        //dd($this->slug);
        $project = Project::where('slug',$this->slug)->with('files')->first();
        return $project;
    }

    #[Computed]
    public function profilePic()
    {
        //dd()
        if($this->project->files()->exists()){
            $profile_pic = File::select('url')->where('fileable_id', $this->project->id)
                                ->where('fileable_type',"App\Models\Project")
                                ->where('is_profile', true)
                                ->first();
            if(!is_null($profile_pic)){
            return $profile_pic['url'];
            }
        }

    }

    #[Computed]
    public function projectStatus()
    {
        if($this->project->is_complete){
            return 'Completed';
        }
        else{
            return 'Incomplete';
        }
    }

    public function projectDelete()
    {
        $project= Project::whereSlug($this->slug)->firstOrFail();
        foreach($project->files as $file){
            unlink('storage/projects/'.$file->url);
			$file->delete();
        }
        $project->delete();
        $this->dispatch('project-created');
        session()->flash('message',"The project was successfully deleted");
        return redirect('/projects/create');
    }

    public function showModal()
    {
        //dd($this->slug);
        $this->dispatch('modalShow',);
        $this->dispatch('modalShowing', slug: $this->slug);
    }

    #[On('image-updated')]
    public function render()
    {
        return view('livewire.projects.show-project');
    }
}
