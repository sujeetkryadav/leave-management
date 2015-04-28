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
                                {{Form::text('userName','',['class'=>'form-control','placeholder'=>'Name'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                 <div class="form-group">
                                {{Form::email('email','',['class'=>'form-control','placeholder'=>'E-mail'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                 <div class="form-group">
                                {{Form::text('contact','',['class'=>'form-control','placeholder'=>'Mobile No.'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                <div class="form-group">
                                {{Form::text('dob','',['class'=>'form-control','placeholder'=>'Click here to select date'])}}
                                    <!-- <input class="form-control" placeholder="E-mail" name="userName" type="text"> -->
                            
                                </div>
                                <div class="form-group">
                                 {{Form::password('password',['class'=>'form-control','placeholder'=>'password'])}}
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
