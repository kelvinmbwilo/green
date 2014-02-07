<div id="sidebar"> 
    <h2 id="logo" ><a href="index.php">{{ HTML::image('img/logo.jpg','',array('class'=>'img-responsive img-rounded', 'style'=>'height:160px;width:90%')) }}</a></h2>  
    <ul>
            <li class="active"><a href="{{url('home')}}"><i class="fa fa-home fa-2x"></i> <span>Dashboard</span></a></li>
            <li class="submenu">
                <a href="#"><i class="fa fa-user fa-2x"></i> <span>User Management</span> <i class="fa fa-chevron-down pull-right"></i></a>
                <ul>
                    <li><a href="{{url("user/add")}}"><i class='fa fa-plus'> </i> Add <i class="fa fa-chevron-right pull-right"></i></a></li>
                    <li><a href="{{ url("user") }}"><i class="fa fa-cog"></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>
                </ul>
            </li>
            <li class="submenu">
                    <a href="#"><i class="fa fa-rss fa-2x"></i> <span>Applicants</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                            <li><a href="{{ url("applicant/add") }}"><i class='fa fa-plus'></i> Add Applicant <i class="fa fa-chevron-right pull-right"></i></a></li>
                            <li><a href="{{ url("applicants") }}"><i class="fa fa-cog"></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>
                    </ul>
            </li>
            <li class="submenu">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i> <span>Groups</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                            <li><a href="#"><i class='fa fa-plus'></i> Add Group <i class="fa fa-chevron-right pull-right"></i></a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>
                    </ul>
            </li>
            <li class="submenu">
                    <a href="#"><i class="fa fa-bar-chart-o fa-2x"></i> <span>Reports</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                        <li><a href="#"><i class='fa fa-building-o'></i> Generate Report <i class="fa fa-chevron-right pull-right"></i></a></li>
                            <li><a href="#"><i class='fa fa-bars'></i> View Report <i class="fa fa-chevron-right pull-right"></i></a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Manage <i class="fa fa-chevron-right pull-right"></i></a> </li>
                    </ul>
            </li>
             <li class="submenu">
                    <a href="#"><i class="fa fa-briefcase fa-2x"></i> <span>Applications</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                            <li><a href="#"><i class="fa fa-cog"></i> Manage <i class="fa fa-chevron-right pull-right"></i></a> </li>
                           <li><a href="#"><i class='fa fa-building-o'></i> History  <i class="fa fa-chevron-right pull-right"></i></a></li>
                    </ul>
            </li>
            <li class="submenu">
                    <a href="#"><i class="fa fa-cog fa-2x"></i> <span>Settings</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                            <li><a href="{{ url("loans") }}"><i class='fa fa-plus'></i> Loans <i class="fa fa-chevron-right pull-right"></i></a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Bussiness <i class="fa fa-chevron-right pull-right"></i></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Data Backup <i class="fa fa-chevron-right pull-right"></i></a></li>
                        <li><a href="{{ url("rules") }}"><i class="fa fa-cog"></i> Rules <i class="fa fa-chevron-right pull-right"></i></a></li>
                    </ul>
            </li>
			
    </ul>
</div>
