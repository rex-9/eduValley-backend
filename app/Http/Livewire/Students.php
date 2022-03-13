<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Students extends Component
{
    public  $students, $search, $name, $email, $g10_eng_unwh, $g7_eng_unwh;
    public $searches = [];
    public $isModalOpen = 0;

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.students.table');
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

    private function resetCreateForm()
    {
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Student::updateOrCreate(['id' => $this->student_id], [
            'name' => $this->name,
            'email' => $this->email,
            'g10_eng_unwh' => $this->g10_eng_unwh,
            'g7_eng_unwh' => $this->g7_eng_unwh,
        ]);

        session()->flash('message', $this->student_id ? 'Student updated.' : 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->g10_eng_unwh = $student->g10_eng_unwh;
        $this->g7_eng_unwh = $student->g7_eng_unwh;

        $this->openModalPopover();
    }

    public function search()
    {
        $this->searches = Student::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')->get();
        return $this->searches;
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted.');
    }
}
