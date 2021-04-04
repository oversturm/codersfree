<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use WithPagination;

    use AuthorizesRequests;

    public $course, $search;

    public function mount(Course $course){
        $this->course = $course;

        $this->authorize('dicatated', $course);
    }

    public function updatingSearch(){ //Este metodo se activa solo cuando modificas la informacion de la propiedad search
        $this->resetPage();//Se e ncarga de formatear la informacion de la propiedad Page
    }

    public function render()
    {
        $students = $this->course->students()
                                 ->where('name', 'LIKE', '%' . $this->search .'%')
                                 ->paginate(4);

        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}
