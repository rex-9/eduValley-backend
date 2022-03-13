<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;


class Courses extends Component
{
    public $course_id, $courses, $teacher_id, $name, $grade, $subject, $image, $token, $zip, $price, $students, $genre, $ongoing;
    public $isModalOpen = 0;

    public function render()
    {
        $this->courses = Course::all();
        return view('livewire.courses.table');
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
        $this->teacher_id = '';
        $this->name = '';
        $this->grade = '';
        $this->subject = '';
        $this->image = '';
        $this->token = '';
        $this->zip = '';
        $this->price = '';
        $this->students = '';
        $this->genre = '';
        $this->ongoing = '';
    }

    public function store()
    {
        $this->validate([
            'teacher_id' => 'required',
            'name' => 'required',
            'grade' => 'required',
            'subject' => 'required',
            'image' => 'required',
            'token' => 'required',
            'price' => 'required',
            'students' => 'required',
            'genre' => 'required',
            'ongoing' => 'required',
        ]);

        Course::updateOrCreate(['id' => $this->course_id], [
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'grade' => $this->grade,
            'subject' => $this->subject,
            'image' => $this->image,
            'token' => $this->token,
            'zip' => $this->zip,
            'price' => $this->price,
            'students' => $this->students,
            'genre' => $this->genre,
            'ongoing' => $this->ongoing,
        ]);

        session()->flash('message', $this->course_id ? 'Course updated.' : 'Course created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_id = $id;
        $this->teacher_id = $course->teacher_id;
        $this->name = $course->name;
        $this->grade = $course->grade;
        $this->subject = $course->subject;
        $this->image = $course->image;
        $this->token = $course->token;
        $this->zip = $course->zip;
        $this->price = $course->price;
        $this->students = $course->students;
        $this->genre = $course->genre;
        $this->ongoing = $course->ongoing;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Course deleted.');
    }
}
