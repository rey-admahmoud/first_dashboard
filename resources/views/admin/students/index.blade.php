

@extends('layout.master')
        <!-- Bread crumb -->
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
        <!-- End Bread crumb -->
        @endsection
        <!-- Container fluid -->
          <!-- Start Page Content -->
          @section('content')
          <div class="row">
            <div class="col-12">
            <div class="card">
              @if(Session::has('msg'))
              <div class="alert alert-success">{{ Session::get('msg') }}</div>
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
                          <th>ssn</th>
                          <th>name</th>
                          <th>dpartment</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ( $studentdata as $val )
                        <tr>
                          <td>{{ $val['ssn'] }}</td>
                          <td>{{ $val['fname']." ".$val['lname'] }}</td>
                          <td>{{ $val['dno'] }}</td>
                          <td>
                            <a href="{{ route('students.show', $val['ssn']) }}" class="btn btn-success">Show</a>
                            <a href="{{ route('students.edit', $val['ssn']) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('students.destroy',$val['ssn'])}}" method="POST" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger" value="delete">
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
        <!-- End Container fluid -->

