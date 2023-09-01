@extends('layout.master')


@section('bread_crumb')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Students</h4>
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
<div class="row">
  <div class="col-12">
  <div class="card">

<form class="form-horizontal" action="{{ route('departments.update',$data->dno)}}" enctype="multipart/form-data" method="post">
  @method('PUT')
  @csrf
  <div class="card-body">
    @if(Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $val )
        <li>{{ $val }}</li>
      @endforeach
    </ul>
    </div>
  @endif
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >department number</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control"
          id="fname"
          placeholder="First Name Here"
          name="dno"
          value="{{ $data->dno }}"
        />
      </div>
    </div>
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >department name</label
      >
      <div class="col-sm-9">
        <input
          type="text"
          class="form-control @error('dname') is-invalid @enderror"
          id="fname"
          placeholder="First Name Here"
          name="dname"
          value="{{ $data->dname }}"
        />
        @error('dname')
        <div class="alert alert-danger">
          correct the depart name
        </div>
        @enderror
      </div>
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