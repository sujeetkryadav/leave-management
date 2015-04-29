 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1>Leave Management Tool</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>User Registration</strong>
                            </h4>
                        </div>
<!--                        <div class="portlet-widgets">
                            <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                       
                        {{Form::open(array('url' => 'registration', 'method' => 'post'))}}
                            <fieldset>
                                  <div class="form-group">
                                {{Form::text('userName','',['class'=>'form-control','placeholder'=>'Name' ,'required'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                 <div class="form-group">
                                {{Form::email('email','',['class'=>'form-control','placeholder'=>'E-mail' ,'required'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                                  @if ($errors->msg->has('email')) <label for="inputNmae" ><span><p>{{{ $errors->msg->first('email') }}}</p> </span></label>@endif
                   
                                </div>
                                 <div class="form-group">
                                {{Form::text('contact','',['class'=>'form-control','placeholder'=>'Mobile No.' ,'required', 'pattern'=>'[0-9]{10}'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                <div class="form-group">
                                {{Form::text('dob','',['class'=>'form-control','id'=>'popupDatepicker','placeholder'=>'select date of Birth' ,'required'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                <div class="form-group">
                                 {{Form::password('password',['class'=>'form-control','placeholder'=>'password' ,'required'])}}
<!--                                     <input class="form-control" placeholder="Password" name="password" type="password" value="">
 -->                                </div>
                                  {{Form::input('submit','submit','Register Me',['class'=>'btn btn-lg btn-green btn-block'])}}

                            </fieldset>
                            <br>
                            <p class="small">
                                </p>
                       {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<link rel="stylesheet" type="text/css" href="assests/jquery.datepick.css">
        <script src="assests/jquery-1.9.1.min.js"></script>
        <script src="assests/jquery.datepick.js"></script>
        <script type="text/javascript">
                      $(function() {
                  $('#popupDatepicker').datepick({yearRange: "1900:-18" });
                 
                        });

                     </script>