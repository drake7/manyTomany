@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('course.create')}}">
    @csrf
<table class="table">
  <tr>
      <td>Short Name</td>
      <td><input type="text" name="short_name" value="{{old('short_name')}}"></td>
  </tr>
  <tr>
      <td>Long Name</td>
      <td><input type="text" name="name" value="{{old('name')}}"></td>
  </tr>
  <tr>
      <td>description</td>
      <td><textarea rows=4 cols=20 name="description" value="{{ old('description') }}"></textarea></td>
  </tr>
  <tr>
      <td>Seats</td>
      <td><input type="number" name="seats" value="{{old('seats')}}"></td>
  </tr>
  <tr>
      <td>Credits</td>
      <td><input type="number" name="credits" value="{{old('credits')}}"></td>
  </tr>
  <tr>
      <td>Last Approved</td>
      <td><input type="date" name="last_approved" value="{{ old('last_approved') }}" ></td>
  </tr>
  <tr><td colspan=2>
    <input type="submit" value="Create Course">
</td>
</tr>
</table>