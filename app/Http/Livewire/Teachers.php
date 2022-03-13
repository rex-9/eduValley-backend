<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Teacher;


class Teachers extends Component
{
    public $teacher_id, $teachers, $name, $photo, $url, $role;
    public $isModalOpen = 0;

    public function render()
    {
        $this->teachers = Teacher::all();
        return view('livewire.teachers.table');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->photo = '';
        $this->url = '';
        $this->role = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'photo' => 'required',
            'url' => 'required',
            'role' => 'required',
        ]);

        Teacher::updateOrCreate(['id' => $this->teacher_id], [
            'name' => $this->name,
            'photo' => $this->photo,
            'url' => $this->url,
            'role' => $this->role,
        ]);

        session()->flash('message', $this->teacher_id ? 'Teacher updated.' : 'Teacher created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->teacher_id = $id;
        $this->name = $teacher->name;
        $this->photo = $teacher->photo;
        $this->url = $teacher->url;
        $this->role = $teacher->role;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Teacher::find($id)->delete();
        session()->flash('message', 'Teacher deleted.');
    }
}
