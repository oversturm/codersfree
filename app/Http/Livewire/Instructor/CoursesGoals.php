<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course,$goal,$name;

    protected $rules=([
        'goal.name' => 'required',

    ]);

    public function mount(Course $course){

        $this->course = $course;
        $this->goal = new Goal();

    }

    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }



    public function store(){

        $this->validate(['name' => 'required']); //Creamos una validadcion para store

        $this->course->goals()->create(['name' => $this->name]);//Accedemos a cursos-relaccion goals-metodo create

        $this->reset('name');//Resetemaos la propiedad name

        $this->course = Course::find($this->course->id);//Pedimos que nos actualice la informacion del curso
    }

    public function edit(Goal $goal){

        $this->goal = $goal;
    }

    public function update(){

        $this->validate(); //Hacemos que se cumplas la validaciones (protected $rules)

        $this->goal->save(); //Guardamos en la base de datos

        $this->goal = new Goal(); //Actualizamos la propiedad Goal

        $this->course = Course::find($this->course->id); //Actualizamos informacion del curso y vamos hacer que nos busque el registro de curso que coincidad con la propiedad course

    }

    public function destroy(Goal $goal){

        $goal->delete();

        $this->course = Course::find($this->course->id);
    }
}
