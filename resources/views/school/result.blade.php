@extends('layouts.school.home')
@section('content')
 <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Font Awesome Icons</h3>
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

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Font Awesome Icons <small>different icon design elements</small></h2>
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
                  @if($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                             <strong>{{ $message }}</strong>
                       </div>
                      @elseif($message = Session::get('error'))
                       <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                       </div>

                       @endif

                  <div class="x_content">
                  	@if($stdnt)
	                  	<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('result.update',$stdnt->id)}}">
	                  		@csrf
	                  		@else
	                  		<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('result.add')}}">
	                  			@csrf
	                  		@endif
	                  		
		                        			<div class="form-group">
	                        					<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Student Name</label>
						                        <div class="col-md-9 col-sm-9 col-xs-12">
						                          <select class="select2_single form-control" tabindex="-1" name="student">
						                            <option value="">--Select Student Name--</option>
						                            @if($students)
						                            @foreach($students as $student)
						                            <option value="{{$student->id}}" {{($student->id == @$stdnt->id)?'selected':''}}>{{$student->student_name}}</option>
						                   
						                            @endforeach
						                            @endif
						                            
						                          </select>
						                          <input type="hidden" name="class_id" value="{{(isset($class_id))?$class_id:''}}">
						                          @if(isset($errors) && $errors->has('student'))
                              							<strong style="color:red">{{ $errors->first('student') }}</strong>
                           		  					@endif
						                        </div>
	                      					</div>

	                      					<div class="form-group">
	                      						<table class="table table-striped jambo_table ">
													<thead>
														<tr class="headings">
															
															<th class="column-title">Subject Name</th>
															
															<th class="column-title">Full Marks(Th)</th>
															<th class="column-title">Full Marks(Pr)</th>
															<th class="column-title">Obtained Marks(Th)</th>
															<th class="column-title">Obtained Marks(Pr)</th>
															
														</th>
														</tr>
													</thead>
													<tbody>
														@if($subjects->subjects)
														@foreach($subjects->subjects as $key=>$subject)
														<tr class="even pointer">
															
															<td class="column-title">{{$subject->subject}}<input type="hidden" value="{{$subject->id}}" name="subject_id[]"</td>
															<td class="column-title">{{$subject->full_marks_theory}}</td>
															<td class="column-title">{{$subject->full_marks_practical}}</td>
															<td class="column-title"><input type="number" name="theory_marks[]" value = "{{@$result->theory_marks[$key]}}">
																@if(isset($errors) && $errors->has('theory_marks.'.$key))
                              										<strong style="color:red">{{ $errors->first('theory_marks.'.$key) }}</strong>
                           		  								@endif</td>
															<td class="column-title"><input type="number" name= "practical_marks[]" value="{{(@$subject->full_marks_practical == 0)?0:@$result->practical_marks[$key]}}" {{(@$subject->full_marks_practical == 0)?"readonly=readonly":''}}>
																 @if(isset($errors) && $errors->has('practical_marks.'.$key))
                              										<strong style="color:red">{{ $errors->first('practical_marks.'.$key) }}</strong>
                           		  								@endif
															</td>
															
														
														</tr>
														@endforeach
														@else
														<p>Sorry!No Subjects Entry For this Class in Database</p>
														@endif
													</tbody>
													
												</table>
	                      					</div>
	                      					<div class="ln_solid"></div>
						                      <div class="form-group">
						                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						                          <button type="button" class="btn btn-primary">Cancel</button>
						                          <button type="reset" class="btn btn-primary">Reset</button>
						                          <button type="submit" class="btn btn-success">Submit</button>
						                        </div>
						                      </div>
		                        		</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
@section('script')
	<script>
		/*var year = 1900;
		var till = 2030;
		var options = "<option value=''>Select Year</option>";
		var roll_no = "<option value=''>Select Roll No</option>";
		var date = "<option value=''>Select Date</option>";
		var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var mn = "<option value=''>Select Month</option>";
			for(var y=year; y<=till; y++){
			  options += "<option value='"+y+"'>"+ y +"</option>";
			}

			for(var i=1;i<101;i++){
				roll_no += "<option value='"+i+"'>"+ i +"</option>";
			}

			for(var i=1;i<33;i++){
				date += "<option value='"+i+"'>"+ i +"</option>";
			}

			for(var i=0;i<=(months.length-1);i++){
				console.log(month[i]);
				mn += "<option value='"+(i+1)+"'>"+ months[i] +"</option>";
			}
			document.getElementById("year").innerHTML = options;
			document.getElementById("enrollment_year").innerHTML = options;
			document.getElementById("roll_no").innerHTML = roll_no;
			document.getElementById("roll_no").innerHTML = roll_no;
			document.getElementById("date").innerHTML = date;
			document.getElementById("month").innerHTML = mn;*/
			/*$("#year").append(options);
			$("#roll_no").append(roll_no);
			$("#enrollment_year").append(options);
			$("month").append(mn);*/
	</script>

	<script>
		     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#student_image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
@endsection