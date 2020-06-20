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
                  	<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">New Student Info</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Result Publish</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Assignment Regulation</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Personality Development</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        	@if(isset($student))
                        	<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('student.update',$student->id)}}">
		                    	@csrf
		                    	@php
		                    	$dob = explode("-",$student->dob);
		                    	
		                    	@endphp
                        	@else
		                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('student.add')}}">
		                    	@csrf
		                    @endif
		                    <div class="form-group">
		                    	<label class="control-label col-md-3 col-sm-3 col-xs-12">Student Photo</label>
		                    	<input type="file"  name="image" onchange="readURL(this);" >
		                    	@if(isset($student, $student->image) &&
                        file_exists(public_path().'/uploads/student/'.$student->image))
                          			<img src="{{asset('uploads/student/'.$student->image) }}" alt=""
                            class="img img-responsive img-thumbnail" style="max-width:180px;" id="student_image">
                            <a href= "" class="btn btn-danger">Delete Image</a>
                            @endif
                        			<img src="" alt="" id="student_image" class="img img-responsive" style="max-width:180px;"/>
                        			@if(isset($errors) && $errors->has('image'))
                              		<strong style="color:red">{{ $errors->first('image') }}</strong>
                           		  @endif
                      		</div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ful Name</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <input type="text" class="form-control" placeholder="Full Name Of Student" name="student_name" value="{{@(isset($student)?$student->student_name:'')}}">
		                          @if(isset($errors) && $errors->has('student_name'))
                              		<strong style="color:red">{{ $errors->first('student_name') }}</strong>
                           		  @endif
		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth (AD)</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                        	<div class = "col-sm-3">
			                          <select name= "Date" id = "date" class="form-control">
			                            @if(isset($student))
				                           <option value="{{$dob[2]}}">{{$dob[2]}}</option>
				                           @else
				                           	<option value="">--Select Date--</option>
				                           @endif
				                           @for($date=0; $date <= 32; $date++)
				                           	<option value="{{$date}}">{{$date}}</option>
				                           @endfor
			                          </select>
			                          @if(isset($errors) && $errors->has('Date'))
                              			<strong style="color:red">{{ $errors->first('Date') }}</strong>
                           		 		 @endif
			                        </div>
		                   			<div class = "col-sm-3">
			                          <select name= "Month"class="form-control" id="month">
			                          	@php
				                           	$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
				                           @endphp
			                          	@if(isset($student))
				                          	@php
				                          	   $index = $dob[1] - 1;
				                          	@endphp
					                           <option value="{{$index}}">{{$months[$index]}}</option>
					                     @else
				                           	<option value="">--Select Month--</option>
				                           @endif
				                           
				                            @for($i= 0 ;$i<= 11; $i++)
				                           	<option value="{{$i+1}}">{{$months[$i]}}</option>
				                           @endfor
		                          		</select>
		                          		@if(isset($errors) && $errors->has('Month'))
                              				<strong style="color:red">{{ $errors->first('Month') }}</strong>
                           		  		@endif
		                          	</div>
		                       		<div class = "col-sm-3">
			                          <select name= "Year"class="form-control" id="year">
			                           
			                            @if(isset($student))
				                           <option value="{{$dob[0]}}">{{$dob[0]}}</option>
				                           @else
				                           	<option value="">--Select Year--</option>
				                           @endif
				                           @for($date=1900; $date <= 2030; $date++)
				                           	<option value="{{$date}}">{{$date}}</option>
				                           @endfor
			                          </select>
			                          @if(isset($errors) && $errors->has('Year'))
                              			<strong style="color:red">{{ $errors->first('Year') }}</strong>
                           		  		@endif
			                      </div>
		                        </div>
		                      </div>


		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Class And Roll No</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                        	<div class = "col-sm-3">
			                          <select name= "class_level"  class="form-control">
			                            <option>Chose Class</option>
			                            @if(isset($class))
			                            @foreach($class as $class)
			                            <option value="{{$class->id}}"  {{($class->id == @$student->class_level)?'selected':''}}>{{$class->name}}</option>
			                            @endforeach
			                            @endif
			                          </select>
			                          @if(isset($errors) && $errors->has('class_level'))
                              				<strong style="color:red">{{ $errors->first('class_level') }}</strong>
                           		  		@endif
			                        </div>
		                   			<div class = "col-sm-3">
			                          <select name= "roll_no"class="form-control" id="roll_no">
				                            
			                            	 @if(isset($student))
				                           		<option value="{{$student->roll_no}}">{{$student->roll_no}}</option>
				                           @else
				                           	<option value="">--Select Rol No--</option>
				                           @endif
				                           @for($roll=1; $roll <= 100; $roll++)
				                           	<option value="{{$roll}}">{{$roll}}</option>
				                           @endfor
		                          		</select>
		                          		@if(isset($errors) && $errors->has('roll_no'))
                              				<strong style="color:red">{{ $errors->first('roll_no') }}</strong>
                           		  		@endif
		                          	</div>
		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Enrollment Year</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                        	<div class = "col-sm-3">
			                          <select name= "enrollment_year"  class="form-control" id="enrollment_year">
			                           
			                            	 @if(isset($student))
				                           		<option value="{{$student->enrollment_year}}">{{$student->enrollment_year}}</option>
				                           @else
				                           	<option value="">--Select Enrollment Year--</option>
				                           @endif
				                           @for($year=1900; $year <= 2030; $year++)
				                           	<option value="{{$year}}">{{$year}}</option>
				                           @endfor
			                          </select>
			                          @if(isset($errors) && $errors->has('enrollment_year'))
                              			<strong style="color:red">{{ $errors->first('enrollment_year') }}</strong>
                           		 	 @endif
			                        </div>
		                        </div>
		                      </div>

		                      

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <input type="text" class="form-control" placeholder="Full Address" name="address" value="{{@(isset($student)?$student->address:'')}}">
		                          @if(isset($errors) && $errors->has('address'))
                              		<strong style="color:red">{{ $errors->first('address') }}</strong>
                           		  @endif
		                        </div>
		                        
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guardian Name</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <input type="text" class="form-control" placeholder="Full Name Of Student" name="guardian_name" value="{{@(isset($student)?$student->guardian_name:'')}}">
		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guardian Contact</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <input type="tel" class="form-control" placeholder="Contact No of Guardian" name="guardian_contact" value="{{@(isset($student)?$student->guardian_contact:'')}}">
		                          @if(isset($errors) && $errors->has('guardian_contact'))
                              		<strong style="color:red">{{ $errors->first('guardian_contact') }}</strong>
                           		  @endif
		                        </div>
		                      </div>

		                      <div class="form-group">
		                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
			                      <div class="radio">
			                            <label>
			                              <input type="radio"  value="male" id="optionsRadios1" name="gender" {{(@$student->gender == 'male')?'checked':''}}> Male
			                            </label>
			                       
			                            <label>
			                              <input type="radio"  value="female" id="optionsRadios1" name="gender" {{(@$student->gender == 'female')?'checked':''}}> Female
			                            </label>

			                            <label>
			                              <input type="radio"  value="other" id="optionsRadios1" name="gender" {{(@$student->gender == 'other')?'checked':''}}> Other
			                            </label>
			                            @if(isset($errors) && $errors->has('gender'))
                              				<strong style="color:red">{{ $errors->first('gender') }}</strong>
                           		  		@endif
			                       </div>
		                   	  </div>

		                   	  <div class="form-group">
		                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Bus Route</label>
		                      	<div class="col-md-9 col-sm-9 col-xs-12">
		                          <select class="form-control" name="bus_route">
		                            <option value = "">Choose Pick/Drop</option>
		                            	@if(isset($bus))
			                            @foreach($bus as $bus)
			                            <option value="{{$bus->name}}" {{(@$student->bus_route == $bus->name)?'selected':''}}>{{$bus->name}}</option>
			                            @endforeach
			                            @endif
		                          </select>
		                          @if(isset($errors) && $errors->has('bus_route'))
                              		<strong style="color:red">{{ $errors->first('bus_route') }}</strong>
                           		  @endif
		                        </div>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        	<div class="row">
	                        	@if(isset($classes))
	                        	@foreach($classes as $key=>$class_name)
	                        		<a href="{{route('class.subject',$class_name->id)}}"class="btn btn-info" id="class_name">{{$class_name->name}}</a>
	                        		@endforeach
	                        	@endif
	                        	</div>
	                        		
	                        	
                        	
                          
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>
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