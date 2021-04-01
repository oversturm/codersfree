<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount(Lesson $lesson ){

        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save(){
        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resources');

        $this->lesson->resource()->create([
            'url' => $url
        ]);

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download(){
        //El metodo storage_path lleva hasta la carpeta storage
        return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
    }

    public function destroy(){

        Storage::delete($this->lesson->resource->url); //Borramos la imagen

        $this->lesson->resource->delete(); //Borramos de la base de datos la imagen

        $this->lesson = Lesson::find($this->lesson->id); // Refescamos la informacion de la leccion
    }

}
