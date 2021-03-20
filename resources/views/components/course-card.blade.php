{{--  Especificamos pasamos una variable como un atributo del componente  --}}
@props(['course'])

<article class="card">
    <img class="w-full h-36 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body">
        <h1 class="card-title">{{Str::limit($course->title, 37)}}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{$course->teacher->name}} </p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"> <i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400 "></i> </li>
                <li class="mr-1"> <i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400 "></i> </li>
                <li class="mr-1"> <i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400 "></i> </li>
                <li class="mr-1"> <i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400 "></i> </li>
                <li class="mr-1"> <i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400 "></i> </li>
            </ul>
            <p class="text-gray-500 text-sm ml-auto">
                <i class="fas fa-users"></i>
                {{$course->students_count}}
            </p>
        </div>

        <a href="{{ route('courses.show', $course)}}" class="btn-card">
            Más información
        </a>
    </div>
</article>
