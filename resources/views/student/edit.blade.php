@section('title',$viewData['title'])
@include('partials.menu')
@include('partials.header')
<form method="POST" action="{{ route('student.update',$viewData['student']->id )  }}">
    @csrf
<table class="striped">
    <tr>
        <td>First Name</td>
        <td><input type="text" name="first_name" value="{{ $viewData['student']->first_name }}"></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><input type="text" name="last_name" value="{{ $viewData['student']->last_name }}"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" value="{{ $viewData['student']->email }}"></td>
    </tr>
    <tr>
        <td>Date of Birth</td>
        <td><input type="date" name="dob" value="{{ $viewData['student']->dob }}"></td>
    </tr>
    <tr>
        <td>Student Number</td>
        <td><input type="text" name="number" value="{{ $viewData['student']->number }}"></td>
    </tr>

    <tr>
        <td colspan=2><input type="submit" value="Update Student" class="btn btn-primary">
    </td>
    </tr>

</table>
@include('partials.footer')