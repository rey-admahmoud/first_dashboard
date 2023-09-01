
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

<form class="form-horizontal" action="{{ route('students.update',$datassn->ssn) }}" enctype="multipart/form-data" method="post">
  @csrf
  @method('PUT')
  
  <div class="card-body">

  
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >ssn</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control @error('ssn') is-invalid @enderror"
          id="fname"
          placeholder="First Name Here"
          name="ssn"
          value="{{ $datassn->ssn }}"
        />
        
          @error('ssn')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
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
          class="form-control @error('fname') is-invalid @enderror"
          id="fname"
          placeholder="First Name Here"
          name="fname"
          value="{{ $datassn->fname }}"
        />
        @error('fname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
          value="{{ $datassn->lname }}"
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
          value="{{ $datassn->email }}"
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
          value="{{ $datassn->username }}"
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
        @if ($datassn->gender=='f')
        <input type="radio" name="gender" value="m" >male
        <input type="radio" name="gender" value="f" checked>female
        @else
        <input type="radio" name="gender" value="m" checked>male
        <input type="radio" name="gender" value="f" >female
        @endif
       
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

          <option value="{{ $val['dno'] }}" 
          @if ( $val->dno == $datassn->dno )
            selected
        @endif>
            {{ $val['dname'] }}
        </option>

          @endforeach
            
       
        </select>
      </div>
    </div>
  </div>
  <div class="border-top">
    <div class="card-body">
      <button type="submit" class="btn btn-primary">
        update
      </button>
    </div>
  </div>
</form>
  </div>
  </div>
</div>
@endsection