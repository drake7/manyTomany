@section('title', 'Course '.$viewData["course"]->name.' - '.$viewData["course"]->short_name)
@include('partials.menu')
@include('partials.header')
    <table class="table">
      <tr>
        <td>Course Name</td>
        <td>{{ $viewData["course"]->name }}</td>
      </tr>
      <tr>
        <td>Course Short name</td>
        <td>{{ $viewData["course"]->short_name }}</td>
      </tr>
      <tr>
        <td>Seats</td>
        <td>Seats: {{ $viewData["course"]["seats"]}}</td>
      </tr>
      <tr>
        <td>Credits</td>
        <td>Credits: {{ $viewData["course"]["credits"]}}</td>
      </tr>
      <tr>
        <td>Description</td>
        <td><br>Description: {{ $viewData["course"]["description"]}}</td>
      </tr>
    </table>
    <h3>Enrollments</h3>
    <table class="table">
    <tr>
      
      <td>Add Enrollment</td>
      <form action="{{ route('enrollment.create') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $viewData['course']->id }}" name="courses_id">
      <td><select name="students_id">
        @foreach($viewData["students"] as $student)
            <option value="{{ $student->id }}">{{ $student->first_name; }} {{ $student->last_name; }}</option>
        @endforeach
</select>
</td>
<td><input type="submit" value="Add Enrollment" class="btn btn-primary"></td> </tr> </table>
<h3>Current Enrollments</h3>
<table class="table table-striped">
    <thead class="thead-dark">
      <tr>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Student Number</th>
      </tr>
    </thead>
@foreach($viewData["enrollments"] as $enrollment) 
  <tr>
    <td>{{ $enrollment->first_name }}
  </td>
    <td> {{ $enrollment->last_name }}
  </td>
    <td>
      {{ $enrollment->number}}
  </td>
  <td>
    <a href="{{ route('enrollment.delete',$enrollment->id) }}" class="btn btn-danger">Unenroll</a>
</td>
</tr>
@endforeach
</table>

    <!-- <a href="{{ url('/courses') }} " class="btn btn-primary">Back</a> -->
    <a href="{{ route('course.list') }} " class="btn btn-primary">Back</a>
  </div>
</div>
@include('partials.footer')