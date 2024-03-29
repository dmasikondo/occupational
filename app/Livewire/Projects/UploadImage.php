<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Livewire\Modal;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class UploadImage extends Modal
{
    use WithFileUploads;

    #[Rule('required|max:200')]
    public $title ='';

    #[Rule('required|sometimes|image:1024|mimes:jpeg,png,jpg,gif')]
    public $project_image;

    public $is_profile = false;


    protected $image_name;

    private $fileableType;
    private $fileableId;

    #[Locked]
    public $slug;

    #[On('modalShowing')]
    public function project($slug)
    {
        $this->slug = $slug;

    }
    public function uploadFile()
    {
        if($this->project_image){
            $this->image_name= Str::slug($this->title.uniqid());
            $validated['project_image'] = $this->project_image->storePubliclyAs(path: 'public/projects', name: $this->image_name.'.jpeg');
        }
        $this->validate();
        $this->store();
    }

    public function store()
    {
        $project = Project::where('slug',$this->slug)->with([
            'files',
        ])->firstOrFail();
        $this->is_profile = $this->setProfileStatusForFirstPic($project);

        $image = $project->files()->create([
            'title' => $this->title,
            'is_profile'=>$this->is_profile,
            'user_id' => auth()->user()->id,
            'url'=>$this->image_name.'.jpeg',
        ]);
        if($this->is_profile == true){
            File::whereNot('id', $image->id)->update(['is_profile'=>false]);
        }

        $this->dispatch('image-updated');
        $this->dispatch('project-created');
        session()->flash('message',"The image file was successfully uploaded");
        $this->reset();
    }

    private function setProfileStatusForFirstPic($project)
    {
        if($project->files->count()>0){
           // dd('is profile'.$this->is_profile);
             return $this->is_profile;
        }
        else{
            return $this->is_profile =true;
        }



    }


    public function render()
    {

        return view('livewire.projects.upload-image');
    }
}
