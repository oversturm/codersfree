<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Audience;


class CoursesAudiences extends Component
{
    public $course, $audience, $name;

    protected $rules= [
        'audience.name' => 'required'
    ];

    public function mount(Course $course){

        $this->course = $course;
        $this->audience = new Audience();
    }


    public function store(Audience $audience){

        $this->validate(['name'=> 'required']);//Validamos la informacion
        $this->course->audiences()->create(['name' => $this->name]);//Accedemos cursos luego recupera la realccion propiedad utilizamos el metodo create guaardar en la base de datos
        $this->reset('name');//Reseteamos la propiedad que hemos guardado

        $this->course = Course::find($this->course->id);//Actualizamos la informacion dentro de cursos
    }

    public function edit(Audience $audience){

        $this->audience = $audience;
    }

    public function update(){

        $this->validate();//Validamos rules
        $this->audience->save();//Guardamos en la base de datos

        $this->audience = new Audience();//Actualizamos la propiedad

        $this->course = Course::find($this->course->id);//Actualizamos la informacion dentro de cursos

    }

    public function destroy(Audience $audience){

        $audience->delete();

        $this->course = Course::find($this->course->id);
    }

    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }



}
