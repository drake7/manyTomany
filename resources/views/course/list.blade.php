@section("title", "Courses List")
@include('partials.menu')
@include('partials.header')
@include('course.add')
<table class="table striped">
  <thead>
  <tr>
    <td>Short Name</td>
    <td>Long Name</td>
    <td>Description</td>
    <td>Seats</td>
    <td>Credits</td>
    @auth
    <td>Edit</td>
    <td>Delete</td>
    @else
    @endauth
  </tr>
  </thead>
@foreach($viewData["courses"] as $course) 
<tr>
<td><a href="{{ url('/courses/'.$course['id']) }}"> {{ $course["short_name"] }}</a></td>
<td>{{ $course["name"] }} </td>
<td>{{ $course["description"] }} </td>
<td>{{ $course["seats"] }} </td>
<td>{{ $course["credits"] }} </td>
@auth
<td><a href="{{ route('course.edit',$course->id) }}">Edit</a></td>
<td><a href="{{ route('course.delete',$course->id) }}">Delete</a></td>
@else
@endauth

</tr>
  </div>
</div> 
@endforeach
@include('partials.footer')