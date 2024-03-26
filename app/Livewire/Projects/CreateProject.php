<?php

namespace App\Livewire\Projects;

use Livewire\Component;
// use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.app')]
class CreateProject extends Component
{
    use WithFileUploads;

    #[Locked]
    public $project_id;

    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $description= '';

    #[Validate('required|date', as: 'Project Start Date')]
    public $start_date = '';

    #[Validate('required', as: 'Project End Date')]
    #[Validate('date')]
    #[Validate('after_or_equal:start_date',
            message: 'Project End Date can not be earlier than the Start Date',
            )]
    public $end_date;

    #[Validate('required', as: 'Street / Village Address')]
    public $street;

    #[Validate('required', as: 'Suburb / Chief')]
    public $suburb;

    #[Rule('nullable|sometimes|image:1024|mimes:jpeg,png,jpg,gif')]
    public $project_image;

    #[Rule('required', as: 'City / Town')]
    public $town;

    public $is_editing = false;
    public $completed = false;
    //private $image_name;
    #[Locked]
    public $slug;


    #[Computed]
    public function currentDate()
    {
        if(!$this->is_editing){
            $this->start_date = Carbon::now()->format('Y-m-d');
        }
    }

    public function save()
    {
        // if($this->project_image){

        //     //dd('maboss');
        //     $this->image_name= Str::slug($this->title.uniqid());
        //     $validated['project_image'] = $this->project_image->storePubliclyAs(path: 'public/projects', name: $this->image_name.'.jpeg');

        // }
        $this->validate();
        $this->storeOrUpdate();
    }

    protected function storeOrUpdate()
    {

       // dd($this->project_image);
        //if project image was present

        //dd($this->image_name);
        if(!$this->is_editing){
            $this->slug= Str::slug($this->title.uniqid());
        }

        Project::updateOrCreate(['slug'=>$this->slug],[
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_completed'=>$this->completed,
            'created_by' => auth()->user()->id,
            //'project_image' => $this->image_name.'.jpeg',
            'street' =>$this->street,
            'suburb' =>$this->suburb,
            'city' =>$this->town,
            'is_complete'=>$this->completed,
        ]);
        //delete the temporary images directory
        // if(Storage::exists('livewire-tmp')){
        //     Storage::deleteDirectory('livewire-tmp');
        // }
        $this->dispatch('project-created');
        session()->flash('message',"The Project was successfully Created. You can add another project");
        $this->reset();

    }

    #[On('editProject')]
    public function edit($slug)
    {
        $this->slug = $slug;
        $project = Project::where('slug',$this->slug)->firstOrFail();
            $this->title = $project->title;
            $this->description = $project->description;
            $this->start_date = Carbon::parse($project->start_date)->format('Y-m-d');
            $this->end_date = Carbon::parse($project->end_date)->format('Y-m-d');
           // $this->image_name = $project->image_name;
            $this->street = $project->street;
            $this->suburb = $project->suburb;
            $this->town = $project->city;
            $this->is_editing = true;
            $this->completed = $project->is_complete;
            if($project->is_complete ==true)
            {
                $this->completed = true;
            }
            else{
                $this->completed = false;
            }
    }

    #[Title('Create Project')]
    public function render()
    {
        //$this->start_date = Carbon::now()->format('Y-m-d');
        return view('livewire.projects.create-project');
                    //->extends('layouts.master');
    }
}
