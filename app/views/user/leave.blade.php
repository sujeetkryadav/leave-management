{{--*/
$user_obj=new UserController();
$userData=$user_obj->getUser(Auth::id());
/*--}}
    <div id="wrapper">

        <div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                User Leaves
                              
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Leave</a>
                                </li>
                                <li class="active">User Leave</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <ul id="userTab" class="nav nav-tabs">
                                    <li class="active"><a href="#overview" data-toggle="tab">Apply</a>
                                    </li>
                                    
                                    </li>
                                </ul>
                                <div id="userTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="overview">

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                      @if(Session::get('message')!='')
                                                     <div class="alert alert-success" id="denger">{{{Session::get('message')}}}</div>
                                                     @endif</div>
                                            <div class="col-lg-7 col-md-5">
                                              
                                                            <h4 class="page-header">Personal Information:</h4>
                                                             {{Form::open(array('url' => 'leave-application', 'method' => 'post'))}}
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                 {{Form::text('name',$userData->name,['class'=>'form-control','placeholder'=>'Name','required'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                 {{Form::text('phone',$userData->contact,['class'=>'form-control','placeholder'=>'Phone No.','required','pattern'=>'[0-9]{10}'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Leave for </label>
                                                                <select class="form-control" id="days">
                                                                <option value="1">1 day</option>
                                                                <option value="2">2 day</option>
                                                                <option value="3">3 day</option>
                                                                <option value="4">4 day</option>
                                                                <option value="5">5 day</option>
                                                                <option value="6">6 day</option>
                                                                <option value="7">7 day</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>From</label>
                                                                 {{Form::text('startDate','',['class'=>'form-control','placeholder'=>'Select date','id'=>'popupDatepicker','required'])}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                 {{Form::text('endDate','',['class'=>'form-control','placeholder'=>'Select date','id'=>'popupDatepick','required' ,'readonly'])}}
                                                            </div>
                                                           <div class="form-group">
                                                                <label>Reasoon</label>
                                                                {{ Form::textarea('notes', null, ['size' => '30x5' ,'class'=>'form-control' ,'required']) }}
                                                            </div>
                                                           {{Form::input('submit','submit','Submit',['class'=>'btn btn-default'])}}
                                                            {{Form::close();}}

                                                        </div>
                                                    </div>
                                                </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.portlet-body -->
                                        </div>
                                <!-- /.portlet -->


                                            </div>
                                            <!-- /.col-lg-12 -->
                                        </div>
                                        <!-- /.row -->

                                    </div>
                                    <!-- /.page-content -->

                                </div>
                                <!-- /#page-wrapper -->
                                <!-- end MAIN PAGE CONTENT -->

                            </div>
  

                                      <!-- Load jQuery and bootstrap datepicker scripts -->
     <link rel="stylesheet" type="text/css" href="assests/jquery.datepick.css">
        <script src="assests/jquery-1.9.1.min.js"></script>
        <script src="assests/jquery.datepick.js"></script>
        <script src="assests/date-validation.js"></script>
        <script type="text/javascript">
         $(".text-center").delay(3000).fadeOut(300);
        </script>

            