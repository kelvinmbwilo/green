<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@if(Auth::guest())
{{  Redirect::to("/")  }}
@endif
<html>
    <head>
        <meta charset="UTF-8">
        <title>Green Financial Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ HTML::style("bootstrap/css/bootstrap.css") }}
        {{ HTML::style("bootstrap/css/bootstrap-theme.css") }}
        {{ HTML::style("font-awesome/css/font-awesome.css") }}
        {{ HTML::style("jqueryui/css/start/jquery-ui.css") }}
        {{ HTML::style("DataTables/media/css/jquery.dataTables.css") }}
        {{ HTML::style("DataTables/media/css/jquery.dataTables_themeroller.css") }}
        {{ HTML::style("style/delta.grey.css") }}
        {{ HTML::style("style/delta.main.css") }}
        {{ HTML::script("js/jquery-1.9.1.js") }}
    </head>
    <body style="background-image: url({{asset("img/black_paper.png")}})">
        
            <div class="row">
                
                <!--left menus-->
                <div class="col-xs-2" style="padding-right:  0px">
                    @include('testmenu')
                    @yield("menu")
                </div>
                
                <!--contents menus-->
                <div class="col-xs-10" id="mainBody" style="background-image: url({{asset("img/brushed_alu.png")}});border-top-left-radius: 20px;padding-right: 20px;min-height: 620px">
                    @include('test')
                    <ol class="breadcrumb">
                        @yield('breadcumbs')
                            
                      </ol>
                    @yield("content")
                </div>
            </div>
        
        
        {{ HTML::script("jqueryui/js/jquery-ui-1.10.3.custom.js") }}
        {{ HTML::script("bootstrap/js/bootstrap.js") }}
        {{ HTML::script("DataTables/media/js/jquery.dataTables.js") }}
    </body>
</html>
