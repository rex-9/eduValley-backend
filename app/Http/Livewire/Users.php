<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\G10EngUnwh;
use App\Models\G7EngUnwh;
use App\Models\G11oldOrganicUtl;
use App\Models\Student;
use Carbon\Carbon;

class Users extends Component
{
    public  $users, $search, $name, $email, $role, $phone, $user_id;
    public $searches = [];
    public $isModalOpen = 0;
    public string $token = '';
    public string $thisMonth;
    public $g10_eng_unwh, $g7_eng_unwh, $g11old_organic_utl;
    public $count_g10_eng_unwh, $count_g7_eng_unwh, $count_g11old_organic_utl;
    public int $old_g10_eng_unwh, $old_g7_eng_unwh, $old_g11old_organic_utl;

    public function render()
    {
        $this->users = User::all();
        // $this->count_g10_eng_unwh = User::where('g10_eng_unwh', 1)->get();
        // $this->count_g7_eng_unwh = User::where('g7_eng_unwh', 1)->get();
        // $this->count_g11old_organic_utl = User::where('g11old_organic_utl', 1)->get();

        // $g10_eng_unwh_count = User::where("g10_eng_unwh", 1)->get();
        // Course::updateOrCreate(["token" => "g10_eng_unwh"], [
        //     'students' => count($g10_eng_unwh_count),
        // ]);

        return view('livewire.users.table');
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
        $this->phone = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'phone' => $this->phone,
            // 'g10_eng_unwh' => $this->g10_eng_unwh,
            // 'g7_eng_unwh' => $this->g7_eng_unwh,
            // 'g11old_organic_utl' => $this->g11old_organic_utl,
        ]);

        // dd($user->g10_eng_unwh, $this->g10_eng_unwh, $user->g11old_organic_utl, $this->g11old_organic_utl);

        // $g10_eng_unwh_count = User::where("g10_eng_unwh", 1)->get();
        // Course::updateOrCreate(["token" => "g10_eng_unwh"], [
        //     'students' => count($g10_eng_unwh_count),
        // ]);

        // $g7_eng_unwh_count = User::where("g7_eng_unwh", 1)->get();
        // Course::updateOrCreate(["token" => "g7_eng_unwh"], [
        //     'students' => count($g7_eng_unwh_count),
        // ]);

        // $g11old_organic_utl_count = User::where("g11old_organic_utl", 1)->get();
        // Course::updateOrCreate(["token" => "g11old_organic_utl"], [
        //     'students' => count($g11old_organic_utl_count),
        // ]);


        // if ($this->old_g10_eng_unwh == 0 & $user->g10_eng_unwh == 1) {
        //     $this->token = "g10_eng_unwh";
        //     $student = Student::updateOrCreate(['email' => $user->email], [
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'g10_eng_unwh' => Carbon::now()->format('M-Y'),
        //     ]);
        //     $course = Course::where('token', 'g10_eng_unwh')->first();
        //     $this->thisMonth = Carbon::now()->format('M-Y');
        //     $this->thisYear = Carbon::now()->format('Y');
        //     $groupedStudents = Student::all()->groupBy('g10_eng_unwh')->toArray();
        //     $noOfStudents = count($groupedStudents[$this->thisMonth]);
        //     G10EngUnwh::updateOrCreate(['MY' => $student->g10_eng_unwh], [
        //         'MY' => $this->thisMonth,
        //         'Y' => $this->thisYear,
        //         'students' => $noOfStudents,
        //         'income' => $noOfStudents * $course->price * 0.6,
        //     ]);
        // }

        // if ($this->old_g7_eng_unwh == 0 & $user->g7_eng_unwh == 1) {
        //     $this->token = "g7_eng_unwh";
        //     $student = Student::updateOrCreate(['email' => $user->email], [
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'g7_eng_unwh' => Carbon::now()->format('M-Y'),
        //     ]);
        //     $course = Course::where('token', 'g7_eng_unwh')->first();
        //     $this->thisMonth = Carbon::now()->format('M-Y');
        //     $this->thisYear = Carbon::now()->format('Y');
        //     $groupedStudents = Student::all()->groupBy('g7_eng_unwh')->toArray();
        //     $noOfStudents = count($groupedStudents[$this->thisMonth]);
        //     G7EngUnwh::updateOrCreate(['MY' => $student->g7_eng_unwh], [
        //         'MY' => $this->thisMonth,
        //         'Y' => $this->thisYear,
        //         'students' => $noOfStudents,
        //         'income' => $noOfStudents * $course->price * 0.6,
        //     ]);
        // }

        // if ($this->old_g11old_organic_utl == 0 & $user->g11old_organic_utl == 1) {
        //     $this->token = "g11old_organic_utl";
        //     $student = Student::updateOrCreate(['email' => $user->email], [
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'g11old_organic_utl' => Carbon::now()->format('M-Y'),
        //     ]);
        //     $course = Course::where('token', 'g11old_organic_utl')->first();
        //     $this->thisMonth = Carbon::now()->format('M-Y');
        //     $this->thisYear = Carbon::now()->format('Y');
        //     $groupedStudents = Student::all()->groupBy('g11old_organic_utl')->toArray();
        //     $noOfStudents = count($groupedStudents[$this->thisMonth]);
        //     G11oldOrganicUtl::updateOrCreate(['MY' => $student->g11old_organic_utl], [
        //         'MY' => $this->thisMonth,
        //         'Y' => $this->thisYear,
        //         'students' => $noOfStudents,
        //         'income' => $noOfStudents * $course->price * 0.6,
        //     ]);
        // }


        session()->flash('message', $this->user_id ? 'Student updated.' : 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    // public function userTokenChanged()
    // {
    //     $user = User::updateOrCreate(['id' => $this->user_id], [
    //         'g10_eng_unwh' => $this->g10_eng_unwh,
    //         'g7_eng_unwh' => $this->g7_eng_unwh,
    //         'g11old_organic_utl' => $this->g11old_organic_utl,
    //     ]);


        // $time = Carbon::now()->toRfc850String();
        // format('d-m-Y H:i:s');

        // dd($user->email, $time, $this->token);
        // $groupedStudents1['2021-10'], $groupedStudents2);
        // , $this->month, $this->year);
    // }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->phone = $user->phone;
        // $this->old_g10_eng_unwh = $this->g10_eng_unwh = $user->g10_eng_unwh;
        // $this->old_g7_eng_unwh = $this->g7_eng_unwh = $user->g7_eng_unwh;
        // $this->old_g11old_organic_utl = $this->g11old_organic_utl = $user->g11old_organic_utl;

        // dd($this->g11old_organic_utl);

        $this->openModalPopover();
    }

    public function search()
    {
        $this->searches = User::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')->get();
        return $this->searches;
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Student deleted.');
    }
}
