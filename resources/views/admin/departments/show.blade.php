@extends('layout.master')
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{ URL::asset('my_css/style.css') }}">

</head>
<body>
  
</body>
</html>
        <!-- Bread crumb -->
        @section('bread_crumb')
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">show student</h4>
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
              <div class="div_subject">
                <p> {{ $data['dname'] }} department</p>
                <table class="table_show">
                  <thead>
                    <tr>
                      <th class="head">department code</th>
                      <th class="head">department name</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <th>{{ $data['dno'] }}</th>
                        <th>{{ $data['dname'] }}</th>
                      </tr>
                  </tbody>
                </table>
              </div>

                <div class="div_subject">
                  <p> the all students in this department</p>
                  <table class="table_show">
                    <thead>
                      <tr>
                        <th class="head">code subject</th>
                        <th class="head">name subject</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($data->student as $val)
                        <tr>
                          <th>{{ $val['ssn'] }}</th>
                          <th>{{ $val['fname']." ".$val['lname'] }}</th>
                        </tr>
                      @empty
                        <tr>
                          <th colspan="2">
                            <h3>NO SUBJECT</h3>
                          </th>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="div_subject">
                  <p> subject of this {{ $data['dname'] }} department</p>
                  <table class="table_show">
                    <thead>
                      <tr>
                        <th class="head">code subject</th>
                        <th class="head">name subject</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($data->subject as $val)
                        <tr>
                          <th>{{ $val['id'] }}</th>
                          <th>{{ $val['name']}}</th>
                        </tr>
                      @empty
                        <tr>
                          <th colspan="2">
                            <h3>NO SUBJECT</h3>
                          </th>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
          </div>
          @endsection