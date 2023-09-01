

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
              @if(Session::has('msg2'))
              <div class="alert alert-success">{{ Session::get('msg2') }}</div>
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
                          <th>id</th>
                          <th>name</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ( $data as $val )
                        <tr>
                          <td>{{ $val['id'] }}</td>
                          <td>{{ $val['name'] }}</td>
                          <td>
                            <a href="{{ route('subjects.edit',$val['id']) }}" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-primary">show</a>
                            <form action="{{ route('subjects.destroy',$val['id'])}}" method="POST" style="display: inline-block">
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

