@extends('layouts.school.home')
@section('content')
<style>
     .center{
     	text-align: center;
     }
	</style>
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>General Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<h2 class="center">School Name</h2>
      		 		<h3 class="center">Result Title</h3>
      		 		<h5>Student Name: {{$student->student_name}}</h5>
      		 		<h5>{{$data->name}}</h5>
      		 		<h5>Roll No:{{$student->roll_no}}</h5>

      		 		<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Subject Name</th>
						      <th scope="col">Full Marks(Th)</th>
						      <th scope="col">Full Marks(Pr)</th>
						      @if($result)
						      @php
						      @endphp
						      <th scope="col">Obtained Marks(Th)</th>
						      <th scope="col">Obtained Marks(Pr)</th>
						      @endif
						    </tr>
						  </thead>
						  <tbody>
						  	@if($data->subjects)
						  	@foreach($data->subjects as $subject)
						    <tr>
						      <th scope="row">1</th>
						      <td>{{$subject->subject}}</td>
						      <td>{{$subject->full_marks_theory}}</td>
						      <td>{{$subject->full_marks_practical}}</td>
						      <td>@mdo</td>
						      <td>@mdo</td>

						    </tr>
						    @endforeach
						    @endif
						    
						    
						  </tbody>
					</table>
					<h5>Total Marks</h5>
					<h5>Percent</h5>
      		 		<h5>Status:Pass/Fail</h5>
      		 		<h5>Remarks:</h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
