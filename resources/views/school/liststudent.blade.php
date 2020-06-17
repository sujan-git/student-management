@extends('layouts.school.home')
@section('content')
 
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small>Some examples to get you started</small></h3>
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
	<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float right</small></h2>
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
                  </div>
                  <div class="x_content">

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home-r">
                          <p class="lead">Home tab</p>
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        </div>
                        <div class="tab-pane" id="class-10">
                        	<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th>
											<input type="checkbox" id="check-all" class="flat">
										</th>
										<th class="column-title">Student Name </th>
										<th class="column-title">Class</th>
										<th class="column-title">Roll No</th>
										<th class="column-title">Guardian</th>
										
										<th class="column-title no-link last"><span class="nobr">Action</span>
									</th>
									<th class="bulk-actions" colspan="7">
										<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
									</tr>
								</thead>
								<tbody id="student_data">
									<tr class="even pointer">
										<!--<td class="a-center ">
											<input type="checkbox" class="flat" name="table_records">
										</td>
										<td class=" ">121000040</td>
										<td class=" ">May 23, 2014 11:47:56 PM </td>
										<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
										<td class=" ">John Blank L</td>
										<td class=" ">Paid</td>
										<td class=" last"><a href="#">View</a>-->
									</td>
									</tr>
								</tbody>
							</table>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-right">
                        <li class="active"><a href="#home-r" data-toggle="tab">Search</a>
                        </li>
                        @if($classes)
                        @foreach($classes as $class)
                        <li><a href="#class-10" data-toggle="tab" onclick='getClass("{{$class->id}}",event,this)'>{{$class->name}}</a>
                        </li>
                        @endforeach
                        @endif
                        
                        
                      </ul>
                    </div>

                  </div>

                </div>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>

<!-- page content 
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small>Some examples to get you started</small></h3>
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
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Plus Table Design</small></h2>
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
	<p class="text-muted font-13 m-b-30">
		DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
	</p>
	
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr class="headings">
					<th>
						<input type="checkbox" id="check-all" class="flat">
					</th>
					<th class="column-title">Student Name </th>
					<th class="column-title">Class</th>
					<th class="column-title">Roll No</th>
					<th class="column-title">Guardian</th>
					<th class="column-title">Image</th>
					<th class="column-title no-link last"><span class="nobr">Action</span>
				</th>
				<th class="bulk-actions" colspan="7">
					<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr class="even pointer">
				<td class="a-center ">
					<input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000040</td>
				<td class=" ">May 23, 2014 11:47:56 PM </td>
				<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class=" last"><a href="#">View</a>
			</td>
		</tr>
	</tbody>
</table>

</div>
</div>
-->
@endsection
@section('script')
<script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
<script>$().DataTable();</script>
<script>
	function getClass(class_name,e,element){
		$('#student_data').empty();
		e.preventDefault();
		$.ajax({
					type: 'get',
					url: '/admin/studentinfo/'+class_name,
				}).done(function(data){
					if(typeof(data) != "object"){
						data = $.parseJSON(data);
					}
					if(data.status == true){
						/*
						<tr class="even pointer">
										<td class="a-center ">
											<input type="checkbox" class="flat" name="table_records">
										</td>
										<td class=" ">121000040</td>
										<td class=" ">May 23, 2014 11:47:56 PM </td>
										<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
										<td class=" ">John Blank L</td>
										<td class=" ">Paid</td>
										<td class=" last"><a href="#">View</a>
									</td>
									</tr>
						*/
						var html = '';
						$.each(data.data, function(key,student){
							html += "<tr class='even pointer'><td class='a-center'><input type='checkbox' class='flat' name='table_records'></td>";
							var url_view = "{{url('/')}}"+"/admin/view/"+student.id;
							html += "<td ><a href='"+url_view+"'>"+student.student_name+"</a></td>";
							html += "<td>"+data.class+"</td>";
							html += "<td >"+student.roll_no+"</td>";
							html += "<td >"+student.guardian_name+"</td>";
							/*var img = "{{asset('uploads/student/')}}";
							img += "/"+student.image;
							html += "<td ><img src='"+img+"' class='img img-responsive'></td>";*/
							var url_edit = "{{url('/')}}"+"/admin/edit/"+student.id;
							var url_delete = "{{url('/')}}"+"/admin/delete/"+student.id;
							
							html += "<td><a href='"+url_edit+"' class='btn btn-primary'><i class='glyphicon glyphicon-pencil'></i></a><a href='"+url_delete+"'  class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></a></td>";
						});
						$('#student_data').append(html);
					}
				});

	}
	</script>
@endsection