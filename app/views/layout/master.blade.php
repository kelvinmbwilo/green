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
    <body style="background-image: url(img/black_paper.png)">
        
            <div class="row">
                
                <!--left menus-->
                <div class="col-xs-2" style="padding-right:  0px">
                    @include('testmenu')
                    @yield("menu")
                </div>
                
                <!--contents menus-->
                <div class="col-xs-10" id="mainBody" style="background-image: url(img/brushed_alu.png);border-top-left-radius: 20px;padding-right: 20px;min-height: 700px">
                    @include('test')
                    @yield("content")
                </div>
            </div>
        
        
        {{ HTML::script("bootstrap/js/bootstrap") }}
        {{ HTML::script("js/script1.js") }}
    </body>
</html>
