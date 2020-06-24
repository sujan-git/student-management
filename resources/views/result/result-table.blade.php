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
                    <a target= "_ "href="{{route('result.pdf',$student->id)}}" class="btn btn-info">Generate PDF</a>
                    <a href="{{route('result.edit',$student->id)}}" class="btn btn-info">Generate PDF</a>
              <h2 class="center">School Name</h2>
      		 		<h3 class="center">Result Title</h3>
      		 		<h5>Student Name: {{$student->student_name}}</h5>
      		 		<h5>{{$data->name}}</h5>
      		 		<h5>Roll No:{{$student->roll_no}}</h5>

      		 		<table class="table table-bordered">
						  <thead>
						    <tr>
						      
						      <th scope="col">Subject Name</th>
						      <th scope="col">Full Marks(Th)</th>
						      <th scope="col">Full Marks(Pr)</th>
						      @if($result)
						      
						      <th scope="col">Obtained Marks(Th)</th>
						      <th scope="col">Obtained Marks(Pr)</th>
						      @endif
                  <th scope="col">Status</th>
						    </tr>
						  </thead>
               @php
                $theory_marks = array();$practical_marks = array();$total_marks = 0;$percent = 0;$full_marks = 0;$final_result=true;
                @endphp
						  <tbody>
						  	@if($data->subjects)
						  	@foreach($data->subjects as $key=>$subject)
                @if($result->subject_ids)
                @php
                for($i=0; $i<count($result->subject_ids);$i++){
                    if($subject->id == $result->subject_ids[$i]){
                     $theory_marks[] = $result->theory_marks[$i];
                     $practical_marks[] = $result->practical_marks[$i];
                  }
                }
                @endphp
                @endif
               
						    <tr>
						      
						      <td>{{$subject->subject}}</td>
						      <td>{{$subject->full_marks_theory}}</td>
						      <td>{{$subject->full_marks_practical}}</td>
						      <td>{{$theory_marks[$key]}}</td>
						      <td>{{$practical_marks[$key]}}</td>
                  <td>
                   @php
                    $status = array();
                    @endphp
                    @if($practical_marks[$key] >= $subject->pass_marks_practical && $theory_marks[$key] >= $subject->pass_marks_theory)
                      @php
                      $status[$key]= 'PASS';
                      if($final_result){
                        $final_result= true;
                      }
                      @endphp
                    @else
                     @php
                      $status[$key]= 'FAIL';
                      if($final_result){
                        $final_result= false;
                      }
                      @endphp
                    @endif
                   {{$status[$key]}}
                  </td>
                  @php
                  $total_marks += $theory_marks[$key] + $practical_marks[$key];
                  $full_marks += $subject->full_marks_practical + $subject->full_marks_theory;
                  @endphp

						    </tr>
						    @endforeach
						    @endif
						  </tbody>
					</table>
          <h5>Full Marks: {{$full_marks}}</h5>
					<h5>Total Marks Obtained: {{$total_marks}}</h5>
         
          @if($final_result)
					<h5>Percent:{{number_format(($total_marks*100)/$full_marks,2).'%'}}</h5>
          @else
          <h5>Percent:</h5>
          @endif
          <h5>Status:{{($final_result)?'PASS':'FAIL'}}</h5>
      		 		
      		 		<h5>Remarks:</h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
