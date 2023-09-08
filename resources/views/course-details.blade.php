
<h2> {{ $course->title }}</h2>
<h3> {{ $course->tagline }}</h3>
<p> {{ $course->description }}</p>
<p> {{ count($course->videos) }} videos</p>
<ul>
    @foreach($course->lessons as $lesson)
        <li> {{ $lesson }}</li>
    @endforeach
</ul>
<img src="{{ $course->image }}" alt="Image for the course {{ $course->title }}">