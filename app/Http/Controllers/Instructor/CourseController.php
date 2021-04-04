<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;

use Illuminate\Support\Facades\Storage; //Lo llamamos para poder alamcenar las imagenes en la carpeta que nosotros digamos

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

    public function index()
    {
        return view('instructor.courses.index');
    }


    public function create()
    {
         //Con el metodo pluck mas el name nos muestra solo nos nombres pero si añadimos el el id nos lo deja en el formato que necesita laravel Collective para mostrarlos
         $categories = Category::pluck('name', 'id');
         $levels = Level::pluck('name', 'id');
         $prices = Price::pluck('name', 'id');
        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'slug'          => 'required|unique:courses',
            'subtitle'      => 'required',
            'description'   => 'required',
            'category_id'   => 'required',
            'level_id'      => 'required',
            'price_id'      => 'required',
            'file'          => 'image'
        ]);
        //Creamos el registro de Cursos
        $course = Course::create($request->all());

        //Si mandamos una imagen se crea un nuevo registro en labla image y se añade a curso
        if ($request->file('file')) {

            $url = Storage::put('cursos', $request->file('file'));

            $course->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit', $course);
    }


    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }


    public function edit(Course $course)
    {
        $this->authorize('dicatated', $course);
        //Con el metodo pluck mas el name nos muestra solo nos nombres pero si añadimos el el id nos lo deja en el formato que necesita laravel Collective para mostrarlos
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit',compact('course', 'categories', 'levels', 'prices'));
    }


    public function update(Request $request, Course $course)
    {
        $this->authorize('dicatated', $course);

        $request->validate([
            'title'         => 'required',
            'slug'          => 'required|unique:courses,slug,' . $course->id,
            'subtitle'      => 'required',
            'description'   => 'required',
            'category_id'   => 'required',
            'level_id'      => 'required',
            'price_id'      => 'required',
            'file'          => 'image'

        ]);

            $course->update($request->all());

            if ($request->file('file')) {
                $url = Storage::put('cursos', $request->file('file'));

                if ($course->image) {
                    Storage::delete($course->image->url);

                    $course->image->update([
                        'url' => $url
                    ]);
                }else{
                    $course->image()->create([
                        'url' => $url
                    ]);
                }
            }

            return redirect()->route('instructor.courses.edit', $course);
    }


    public function destroy(Course $course)
    {
        $course->destroy('delete');
    }

    public function goals(Course $course){
        $this->authorize('dicatated', $course);
        return view('instructor.courses.goals', compact('course'));
    }
}
