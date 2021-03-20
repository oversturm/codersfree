<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;//Utilizar las policies

class CourseStatus extends Component
{

    use AuthorizesRequests;

    public $course, $current;

    public function mount(Course $course){
        $this->course = $course;

        //Recuperamos todas las lecciones que pertenecen a un curso en particular por la relaccion con lesson
        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
        //Solventar el error cuando todas las lecciones estan completadas
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);//Verifica si el usuario esta autentificado
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Metodos
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;

    }
    public function completed(){
        if ($this->current->completed) {
            //Eliminar Registro
            //LLamamos al registro, relacion users para acceder a la relaccion hay que poner los () queremos eliminar registros utilizamor metodo detach y dentro le pasamos el id del usuario actualmente autentificado.
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar Registro
            $this->current->users()->attach(auth()->user()->id);
        }
        //Añadimos para que actualice las lecciones, pedimos la que la propiedad se rellene la Leccion que coincida con ese id.
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades COMPUTADAS (cuando es un propiedad computada y no estatica se le pasa deltante en la vista $this)
    public function getIndexProperty(){
        //El metodo pluck solo creara una coleccion pero solo con el id
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if ($this->index == 0) {
           return null;
        }else{
           return $this->course->lessons[$this->index - 1];
        }

    }

    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count() -1) {
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
        //Calculando las lecciones completadas
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        return round($advance, 2);

    }
}
