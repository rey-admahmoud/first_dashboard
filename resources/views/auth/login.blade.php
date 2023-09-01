@extends('front.master')
@section('content')
<div class="login-page">
    <div class="form">
      {{-- <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form> --}}
      <form class="login-form" action="{{ route('handlelogin') }}" method="POST">
        @csrf
        <input type="text"name="email" placeholder="email"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit">
        <p class="message">don't have account? <a href="{{ route('register') }}">Create an account</a></p>
      </form>
    </div>
  </div>@endsection