@section('title', $viewData['title'])
@include('partials.menu')
@include('partials.header')

<table class="striped">
    <tr>
        <td>First Name</td>
        <td> {{ $viewData["student"]->first_name; }}</td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td> {{ $viewData["student"]->last_name; }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> {{ $viewData["student"]->email; }}</td>
    </tr>

</table>

<h3>Enrollments</h3>
<form method="POST" action="{{ route('enrollment.create') }}">
    @csrf
    <input type="hidden" name="students_id" value="{{ $viewData['student']->id }}">
<table class="table">
    <tr>
        <td>Add Enrollment:</td>
        <td>
        <select name="courses_id">
        @foreach ($viewData["courses"] as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
        </select>
        </td>
        <td>
            <input type="submit" value="Enroll" class="btn btn-primary">
</tr>
</table>
<h3>Enrollments</h3>


<table class="table table-striped">

@foreach($viewData["enrollments"] as $enrollment)
    <tr>
        <td>
            {{ $enrollment->name }}
        </td>
        <td>
            <a href="{{ route('enrollment.delete',$enrollment->id) }}" class="btn btn-danger">Unenrol</a><br>
        </td>
    </tr>
@endforeach
</table>

<a href=" {{ url('/students')  }}" class="button">Back to Student List</a>
@include('partials.footer')