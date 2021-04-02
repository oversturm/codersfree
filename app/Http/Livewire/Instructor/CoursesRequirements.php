<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name;

    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course){

        $this->course = $course;
        $this->requirement = new Requirement();
    }


    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function store(){

        $this->validate(['name'=> 'required']); //Creamos una validaacion para store con name

        $this->course->requirements()->create(['name'=> $this->name]);//Accedemos a cursor ala relaccion con requerimientos y le pedimos crear el registro

        $this->reset('name');//Reseteamos la información
        $this->course = Course::find($this->course->id); //Actualizamos la informacion del curso en la bbdd
    }

    public function edit(Requirement $requirement){

        $this->requirement = $requirement;

    }

    public function update(){

        $this->validate(); //Validamos las reglas de rules
        $this->requirement->save(); //Guardamos en la base de datos

        $this->requirement = new Requirement; //Actualizamos la propiedad en la base datos

        $this->course = Course::find($this->course->id);//Actualizamos la informacion del curso;

    }

    public function destroy(Requirement $requirement){

        $requirement->delete();

        $this->course = Course::find($this->course->id);
    }


}
