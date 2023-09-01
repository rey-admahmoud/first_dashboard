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
    @if(Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
    @if(Session::has('msg2'))
    <div class="alert alert-danger">{{ Session::get('msg2') }}</div>
    @endif
      <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
          <table
            id="zero_config"
            class="table table-striped table-bordered"
          >
            <thead>
              <tr>
                <th>department number</th>
                <th>department name</th>
                <th>created at</th>
                <th>updated at</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
             @forelse ($deptdata as $val)
               <tr>
                <td>{{ $val['dno'] }}</td>
                <td>{{ $val['dname'] }}</td>
                <td>{{ $val['created_at'] }}</td>
                <td>{{ $val['updated_at'] }}</td>
                <td style="width: 30%">
                    <a href="{{ route('departments.show', $val['dno']) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('departments.edit', $val['dno']) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('departments.destroy',$val['dno']) }}" method="POST" style="display:inline-block">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
               </tr>
             @empty
               <h1>NO DATA</h1>
             @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Page Content -->

@endsection