<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Green Financial Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ HTML::style("bootstrap/css/bootstrap.css") }}
        {{ HTML::style("bootstrap/css/bootstrap-theme.css") }}
        {{ HTML::style("font-awesome/css/font-awesome.css") }}
        {{ HTML::style("jqueryui/css/start/jquery-ui.css") }}
        {{ HTML::style("style/delta.grey.css") }}
        {{ HTML::style("style/delta.main.css") }}
        {{ HTML::script("js/jquery-1.9.1.js") }}
    </head>
    <body style="background-image: url(pattern/pattern16.png)">
        
            <div class="container" style="padding-top: 160px">
                <div class="panel panel-success col-sm-offset-3" style="width: 50%;">
                    <div class="panel-heading">
                        <h3 class="panel-title text-muted"><b>GREEN FINENCIAL SOLUTIONS (T) LTD <span class="pull-right">Login</span></b></h3>
                    </div>
                    <div class="panel-body">
                        @if(isset($error))
                        <div class="alert alert-danger alert-dismissable" style="padding: 5px">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>{{ $error }}!</strong> 
                          </div>
                        @endif
                        <form class="form-horizontal" role="form" action="{{route('login')}}" method="POST">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label text-muted" >Email</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Email" required name="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label text-muted">Password</label>
                          <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                  <input type="checkbox" name='keep'><span class="text-muted">Remember me</span> 
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    
                    <div class="panel-footer text-center btn-success">&COPY; {{ date("Y") }} Green Financial Solution</div>
                  </div>
        
            </div>
        {{ HTML::script("bootstrap/js/bootstrap") }}
        {{ HTML::script("js/script1.js") }}
    </body>
</html>
