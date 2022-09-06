@extends('layouts.login')

@section('content')

<p></p>
@foreach ($images as $images)
@if ($images->id)
<figure>
  <tr>
    <td>
      <img width="35" src="{{ asset('storage/' . $images->images) }}" >
    </td>
    <th>name</th>
    <td>{{ $images->username }}</td>
    <th>bio</th>
    <td>{{ $images->bio }}</td>
  </tr>
</figure>
@endif
@endforeach

@foreach ($list as $list)
<table>
  @if ($list->user_id)
  <tr>
    <td><img width="32" src="{{ asset('storage/' . $list->images) }}" ></td>
    <td>{{ $list->username }}</td>
    <td>{{ $list->post }}</td>
  </tr>
  @endif
</table>

@endforeach

@endsection
