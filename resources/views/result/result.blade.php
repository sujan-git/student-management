 @extends('layouts.school.home')
 @section('content')
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


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Result </a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <form>
                          	<div class="form-control">
                          		<input type="text" placeholder="Search Here">
                          	</div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          @if($classes)
                          @foreach($classes as $class)
                          <a class="btn btn-info"  onclick='getClass("{{$class->id}}",event,this)'>{{$class->name}}</a>
                          @endforeach
                          @endif
                          <table class="table table-striped jambo_table bulk_action" id="student_data_table">
                            <thead>
                              <tr class="headings">
                                
                                <th class="column-title">Student Name </th>
                                <th class="column-title no-link last"><span class="nobr">View</span>
                                </th>
                                <th class="column-title"><span class="nobr">Edit</span>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
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

 @endsection
 @section('script')
 <script>$('#student_data_table').hide();</script>
 <script>
  function getClass(class_name,e,element){
    $('#student_data_table').show();
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
              html += "<tr class='even pointer'>";
              var url_view = "{{url('/')}}"+"/admin/view/"+student.id;
              html += "<td ><a href='"+url_view+"'>"+student.student_name+"</a></td>";
              var url_result = "{{url('/')}}"+"/admin/print/result/"+student.id;
               var url_result_edit = "{{url('/')}}"+"/admin/edit/result/"+student.id;
              
              html += "<td><a href='"+url_result+"' class='btn btn-info'><i class=glyphicon glyphicon-random'></i>See Result</a></td>";
              html += "<td><a href='"+url_result_edit+"' class='btn btn-info'><i class=glyphicon glyphicon-random'></i>Edit Result</a></td>";
            });
            $('#student_data').append(html);
          }
        });

  }
  </script>
 @endsection