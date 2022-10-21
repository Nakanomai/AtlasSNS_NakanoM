@extends('layouts.login')
@section('content')
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<form class="" action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
  <?php $user = Auth::user(); ?>
  <div class="profile-container">
    <figure><img width="32" src="{{ asset('storage/' . $user->images ) }}"></figure>
    <div class="form-update">
      <div class="profile-wrapper">
        user name
        <input type="text" value="{{ $user->username }}" class="input" name="name">
      </div>
      <div class="profile-wrapper">
        mail adress
        <input type="text" value="{{ $user->mail }}" class="input" name="mail">
      </div>
      <div class="profile-wrapper">
        password
        <input type="password" class="input" name="password">
      </div>
      <div class="profile-wrapper">
        password comfirm
        <input type="password" value="" class="input" name="password">
      </div>
      <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
      <div class="profile-wrapper">
        bio
        <textarea name="bio" rows="2"></textarea>
      </div>
      <div class="profile-wrapper">
        icon image
        <input type="file" name="images" class="custom-file-input" id="fileImage">
      </div>
    </div>
    <div class="btn-profileupdate">
      <button type="submit" class="btn btn-primary btn-profileupdate">更新</button>
    </div>
    {{csrf_field()}}
  </div>

</form>
@endsection
