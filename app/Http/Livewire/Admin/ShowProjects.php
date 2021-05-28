<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\withFileUploads;


class ShowProjects extends Component
{
    use WithPagination;
    use withFileUploads;

    public $open_edit = false;

    public $image;
    public $resetInputImage;

    public $search = '';
    public $listeners = 'render';
    public $open_delete = false;
    public $readyToLoad = false;
    public $project;



    public function mount(){
        $this->resetInputImage = rand();
        $this->project = new Project();
    }

    public function render()
    {
        if ($this->readyToLoad) {
            $projects = Project::where('title', 'LIKE', '%'. $this->search. '%')
                            ->orwhere('description', 'LIKE', '%' . $this->search . '%')
                            ->paginate(5);
        } else {
            $projects = [];
        }
        return view('livewire.admin.show-projects', compact('projects'));
    }

    public function loadProjects(){
        $this->readyToLoad = true;
    }

    protected $rules = [
        'project.title' => 'required',
        'project.description' => 'required|min:15',
        'project.link' => 'required|url',
        //'project.image' => 'image|max:1024'
    ];


    public function modalEdit(Project $project)
    {
        $this->project = $project;
        $this->open_edit = true;
        //dd($project);
    }

    public function update()
    {
        if ($this->image) {
            Storage::delete([$this->project->image]);

            $this->project->image = $this->image->store('projects');
        }

        $this->project->save();

        $this->reset('open_edit', 'image');
        $this->identificador = rand();

        $this->emit('alert', 'Se actualizado correctamente');
    }

    public function confirmDeleting($id)
    {
        $this->open_delete = $id;
    }

    public function delete(Project $projecto)
    {

        Storage::delete($projecto->image);
        $projecto->delete();
        $this->open_delete = false;

        $this->emit('alert', 'Se ha eliminado con éxito');
    }
}
