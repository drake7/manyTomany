@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('student.create')  }}">
    @csrf
<table class="striped">
    <tr>
        <td>First Name</td>
        <td><input type="text" name="first_name" value="{{old('first_name')}}"></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><input type="text" name="last_name" value="{{ old('last_name')}}"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" value="{{ old('email')}}"></td>
    </tr>
    <tr>
        <td>Date of Birth</td>
        <td><input type="date" name="dob" value="{{ old('dob') }}"></td>
    </tr>
    <tr>
        <td>Student Number</td>
        <td><input type="text" name="number" value="{{old('number')}}"></td>
    </tr>

    <tr>
        <td colspan=2><input type="submit" value="Create Student" class="btn btn-primary">
    </td>
    </tr>

</table>