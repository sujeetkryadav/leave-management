   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1>Leave Management Tool</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>User Login</strong>
                            </h4>
                        </div>
<!--                        <div class="portlet-widgets">
                            <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                         @if(Session::get('msg')!='')
                            <div class="alert alert-danger" id="danger">{{{Session::get('msg')}}}</div>
                          @endif                         
                        {{Form::open(array('url' => 'login', 'method' => 'post'))}}
                            <fieldset>
                                <div class="form-group">
                                {{Form::email('userName','',['class'=>'form-control','placeholder'=>'E-mail'])}}
                                                  
                            
                                </div>
                                <div class="form-group">
                                 {{Form::password('password',['class'=>'form-control','placeholder'=>'password'])}}
                                @if ($errors->msg->has('password')) <label for="inputNmae" ><span><p>{{{ $errors->msg->first('password') }}}</p> </span></label>@endif                          </div>
                                  {{Form::input('submit','submit','Sign In',['class'=>'btn btn-lg btn-green btn-block'])}}

<!--                                 <input type="submit" class="btn btn-lg btn-green btn-block" value="Sign In">
 -->                             {{Form::close()}}
                               <a href="signup" class="btn btn-lg btn-green btn-block"> New User</a>
                               </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
