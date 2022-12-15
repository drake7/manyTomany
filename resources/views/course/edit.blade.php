@section('title',$viewData['title'])
@include('partials.header')
<form method="POST" action="{{ route('course.update',$viewData['course']->id)}}">
    @csrf
<table class="table">
  <tr>
      <td>Short Name</td>
      <td><input type="text" name="short_name" value=" {{ $viewData['course']->short_name }}"></td>
  </tr>
  <tr>
      <td>Long Name</td>
      <td><input type="text" name="name" value="{{ $viewData['course']->name }}"></td>
  </tr>
  <tr>
      <td>description</td>
      <td><textarea rows=4 cols=20 name="description">{{ $viewData['course']->description }}</textarea></td>
  </tr>
  <tr>
      <td>Seats</td>
      <td><input type="number" name="seats" value="{{ $viewData['course']->seats }}"></td>
  </tr>
  <tr>
      <td>Credits</td>
      <td><input type="number" name="credits" value="{{ $viewData['course']->credits }}"></td>
  </tr>
  <tr>
      <td>Last Approved</td>
      <td><input type="date" name="last_approved" value="{{ $viewData['course']->last_approved }}" ></td>
  </tr>
  <tr><td colspan=2>
    <input type="submit" value="Update Course">
</td>
</tr>
</table>
@include('partials.footer')