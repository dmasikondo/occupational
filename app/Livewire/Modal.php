<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Modal extends Component
{

	public $show = false;
    public $slug;

	//protected $listeners = ['modalShow'];

    #[On('modalShow')]
	public function modalShow()
	{
		$this->show = true;
        //dd($this->slug);
        //$this->dispatch('upload', slug: $this->slug);
		//$this->resetForm();
		//$this->resetValidation();
	}

	public function hide()
	{
		$this->show = false;
	}
}

