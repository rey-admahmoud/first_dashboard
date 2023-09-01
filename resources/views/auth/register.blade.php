@extends('front.master')
@section('content')
<div class="main-w3layouts wrapper">
    <h1>registration</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            @if ($errors->any())
                <div style="color: red">
                    <ul>
                        @foreach ($errors->all() as $val )
                            <li>{{ $val }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('handleregister') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div>
                    <input class="text" type="text" name="name" placeholder="name" required="">
                    @error('name')
                        <div class="alert alert-danger"> the name not correct</div>
                    @enderror
                </div>
                <div style="margin: 20px 0">
                    <input class="text" type="text" name="email" placeholder="email" required="">
                @error('email')
                    <div class="alert alert-danger"> the name not correct</div>
                @enderror
                </div>
               <div>
                <input class="text" type="password" name="password" placeholder="Password" required="">
                @error('password')
                    <div class="alert alert-danger"> the password not correct</div>
                @enderror
               </div>
                {{-- <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div> --}}
                <input type="submit" value="SIGNUP">
            </form>
            <p>have an Account? <a href="{{ route('login') }}"> Login Now!</a></p>
        </div>
    </div>

@endsection