<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;

class CourseController extends Controller
{

    public function index()
    {
        return view('instructor.courses.index');
    }


    public function create()
    {
        return view('instructor.courses.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }


    public function edit(Course $course)
    {
        //Con el metodo pluck mas el name nos muestra solo nos nombres pero si añadimos el el id nos lo deja en el formato que necesita laravel Collective para mostrarlos
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit',compact('course', 'categories', 'levels', 'prices'));
    }


    public function update(Request $request, Course $course)
    {
        //
    }


    public function destroy(Course $course)
    {
        $course->destroy('delete');
    }
}
