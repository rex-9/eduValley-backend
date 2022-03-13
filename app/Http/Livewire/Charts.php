<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Charts extends Component
{
    public $g10_eng_unwh_MY, $g10_eng_unwh_students, $g10_eng_unwh_income;
    public $g7_eng_unwh_MY, $g7_eng_unwh_students, $g7_eng_unwh_income;
    public $g11old_organic_utl_MY, $g11old_organic_utl_students, $g11old_organic_utl_income;

    public $count;


    public $g10_eng_unwh, $g7_eng_unwh, $g11old_organic_utl;

    public function render()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            $users = Course::find($course->id)->users;
        }


        // $this->g11old_organic_utl = G11oldOrganicUtl::all();

        // $this->g10_eng_unwh_MY = G10EngUnwh::pluck('MY');
        // $this->g7_eng_unwh_MY = G7EngUnwh::pluck('MY');
        // $this->g11old_organic_utl_MY = G11oldOrganicUtl::pluck('MY');

        // $this->g10_eng_unwh_students = G10EngUnwh::pluck('students');
        // $this->g7_eng_unwh_students = G7EngUnwh::pluck('students');
        // $this->g11old_organic_utl_students = G11oldOrganicUtl::pluck('students');

        // $this->g10_eng_unwh_income = G10EngUnwh::pluck('income');
        // $this->g7_eng_unwh_income = G7EngUnwh::pluck('income');
        // $this->g11old_organic_utl_income = G11oldOrganicUtl::pluck('income');

        return view('livewire.charts');
    }

}
