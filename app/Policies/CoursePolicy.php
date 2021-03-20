<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Course;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $course){

        return $course->students->contains($user->id);
    }
    //En un policy siempre hay que pasarle el objeto User y opcionalmente otro objeto
    //Añadimos el signo de interrogacion delante para que no bloquee a los usuarios que no estan autentificados
    public function published(?User $user, Course $course){
        if ($course->status == 3) {
            return true;
        }else{
            return false;
        }
    }
}
