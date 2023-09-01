

@extends('layout.master')
@section('bread_crumb')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">add students</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
              <a href="#">Add New</a></li>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
@endsection

@section('content')
@section('content')
<div class="row">
  <div class="col-12">
  <div class="card">

<form class="form-horizontal" action="{{ route('students.store') }}" enctype="multipart/form-data" method="post">
  {{-- @method('put') --}}
  @csrf
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $val )
            <li>{{ $val }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
  
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >ssn</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="ssn"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >fname</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="fname"
        />
      </div>
    </div>

    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >lname</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="lname"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >email</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="email"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >username</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="username"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >gender</label
      >
      <div class="col-sm-9">
       <input type="radio" name="gender" value="m">male
       <input type="radio" name="gender" value="f">female
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >image</label
      >
      
      <div class="col-sm-9">
       <input type="file" name="image">
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >Department</label
      >
      <div class="col-sm-9">
        <select class="form-control" name="department">
          @foreach ($deptdata as $val)
          <option value="{{ $val['dno'] }}">{{ $val['dname'] }}</option>
          @endforeach
            
       
        </select>
      </div>
    </div>
  </div>
  <div class="border-top">
    <div class="card-body">
      <button type="submit" class="btn btn-primary">
        Add
      </button>
    </div>
  </div>
</form>
  </div>
  </div>
</div>
@endsection