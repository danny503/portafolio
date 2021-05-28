<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\withFileUploads;

class CreateProject extends Component
{
    use withFileUploads;

    public $open = false;
    public $title;
    public $description;
    public $link;
    public $image;
    public $resetInputImage;


    public function mount(){
        $this->resetInputImage = rand();
    }

    public function render()
    {
        return view('livewire.admin.create-project');
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required|min:15',
        'link' => 'required|url',
        'image' => 'required|image|max:1024'
    ];

    public function save()
    {
        $this->validate();

        $image = $this->image->store('projects');

        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'image' => $image
        ]);

        $this->reset(['open', 'title', 'description', 'link', 'image']);
        $this->resetInputImage = rand();

        $this->emitTo('admin.show-projects', 'render');
        $this->emit('alert', 'Se ha guardado con éxito');
    }
}
