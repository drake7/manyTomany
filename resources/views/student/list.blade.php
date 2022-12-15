@section('title', $viewData['title'])
@include('partials.menu')
@include('partials.header')
@include('student.add')
<table class="table table-striped">
<tr>
    <thead>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>DoB</td>
        <td>Number</td>
        @auth
        <td>Edit</td>
        <td>Delete</td>
        @endauth
    </thead>
</tr>
@foreach($viewData["students"] as $student)
<tr>
    <td>
    <a href="/students/{{ $student->id }}">
    {{ $student->first_name }}</a></td>

    <td> {{ $student->last_name}}</td>
    <td> {{ $student->email }}</td>
    <td> {{ $student->dob }}</td>
    <td> {{ $student->number }}</td>
    @auth
    <td><a href=" {{ route('student.edit', $student->id) }}">Edit</a></td>
    <td><a href=" {{ route('student.delete', $student->id) }}">Delete</a></td>
    @endauth

</tr>
@endforeach
</table>
@include('partials.footer')