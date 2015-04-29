{{--*/
$user_obj=new UserController();
$userData=$user_obj->getUser(Auth::id());
//print_r();
$obj=new LeaveController();
$detail=$obj->getAllLeave(Auth::id());
//print_r($detail); 
$i=1;
    /*--}}
    <div id="wrapper">
        <div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE AREA -->
                <!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Welcome {{$userData->name}}
                                <small></small>
                           
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                                
                                <li class="pull-right">
                                    <div id="" class="btn btn-green btn-square date-picker" data-container="body" data-toggle="popover" data-placement="left" data-content="">
                                      
                                        <i class="fa fa-calendar"></i>
                                        <span class=""></span> <i class=""></i>
                                       
                                    </div>
                                </li>
                               
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                 <script src="assests/js/demo/notifications-demo.js"></script>
                <!-- /.row -->
                <!-- end PAGE TITLE AREA -->

                <!-- begin DASHBOARD CIRCLE TILES -->
                <div class="row">
  
                    <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-12">
                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 align="center"> <i class="fa fa-bell  ">General Notice Board</i></h1>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                         <th>Name</th>
                                                        <th>Reason</th>
                                                        <th>Status</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($detail as $value)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td> {{{$value->name}}}</td>
                                                        <td style="width:200px;"> {{{$value->comments}}}</td>
                                                        <td> {{{$value->status}}}</td>
                                                        <td> {{{$value->from}}}</td>
                                                        <td> {{{$value->to}}}</td>
                                                       
                                                    </tr>
                                                    {{--*/ $i++; /*--}}
                                                    @endforeach
                                                
                                                </tbody>

                                            </table>
                                           {{$detail->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
    <!-- /#wrapper -->

    
