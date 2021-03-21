<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        //Recurperamos todos los cursos y para que se mantenga la colección utilizamos get
        //Cuando user_id sea igual al id del este usuario
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                           ->where('user_id', auth()->user()->id)
                           ->latest('id')
                           ->paginate(8);

        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function limpiar_page(){

        $this->reset('page');
    }
}
