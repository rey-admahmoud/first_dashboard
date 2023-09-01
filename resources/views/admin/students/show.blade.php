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
                <p>{{ $showdata['fname']." ".$showdata['lname'] }} data</p>
                <table class="student_data">
                  <tr>
                    <th class="head">name data</th>
                    <th class="head">data</th>
                  </tr>
                    <tr>
                        <th>SSN </th>
                        <th>{{ $showdata['ssn'] }}</th>
                    </tr>
                    <tr>
                        <th>name: </th>
                        <th>{{ $showdata['fname']." ".$showdata['lname'] }}</th>
                    </tr>
                    <tr>
                        <th>ssn</th>
                        <th>{{ $showdata['email'] }}</th>
                    </tr>
                    <tr>
                        <th>gender</th>
                        <th>{{ $showdata['gender'] }}</th>
                    </tr>
                    <tr>
                        <th>department</th>
                        <th>{{ $showdata->department->dname }}</th>
                    </tr>
                    <tr>
                      <th>image student</th>
                      <th>
                        <img 
                        src="{{ URL::asset('assets/images/students')."/".$showdata['image'] }}"
                        alt="image student"
                        style="width: 150px; height:150px"
                        >
                      </th>
                  </tr>
                </table>
              </div>
                <div class="div_subject">
                  <p>{{ $showdata['fname']." ".$showdata['lname'] }} study this subject</p>
                  <table class="table_show">
                    <thead>
                      <tr>
                        <th class="head">code subject</th>
                        <th class="head">name subject</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($substudent as $val)
                        <tr>
                          <th>{{ $val['id'] }}</th>
                          <th>{{ $val['name'] }}</th>
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