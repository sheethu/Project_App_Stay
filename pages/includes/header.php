 <?php
/**
    * Header for App Stay
    *
    * Details about the Header of the App stay
    *
    * LICENSE: Root5 
    *
    * @copyright  Copyright (c) 2005-2015 Root5  (http://www.root5solutions.com)
    * @license    http://www.root5.com/license   BSD License
    * @version    1.0.0  
    * @since      File available since Release 1.0.0
    * @author     sheethal
*/
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle sr-only" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="profile.php">Admin</a>
    </div>
    <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i>  
                <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages sr-only">  
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown ">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks sr-only">
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> 
                <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts sr-only">                       
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/root5/admin/template/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
                <!-- /input-group -->
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-dashboard fa-fw"></i> Admin Profile</a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-bar-chart-o fa-fw"></i> HOTELS<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Hotel 1<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="hotel1_galery.php?page_id=1"> Add & Edit Offers</a>
                                </li>
                                <li>
                                    <a href="hotel1_galery_event.php?page_id=1">Add & Edit Events</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Hotel 2<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="hotel2_galery.php?page_id=2"> Add & Edit Offers</a>
                                </li>
                                <li>
                                    <a href="hotel2_galery_event.php?page_id=2">Add & Edit Events</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> OFFERS</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="hotel1_offers.php?page_id=1"><i class="fa fa-table fa-fw"></i>Hotel 1</a>        
                        </li>
                        <li>
                            <a href="hotel1_offers.php?page_id=2"><i class="fa fa-table fa-fw"></i>Hotel 2</a>                            
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> EVENTS</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="hotel1_events.php?page_id=1"><i class="fa fa-edit fa-fw"></i>Hotel 1</a>                                   
                        </li>
                        <li>
                            <a href="hotel1_events.php?page_id=2"><i class="fa fa-edit fa-fw"></i>Hotel 2</a>  
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-book"></i> SERVICES</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="hotel1_service.php?page_id=1"><i class="glyphicon glyphicon-book"></i>Hotel 1</a>     
                        </li>
                        <li>
                            <a href="hotel2_service.php?page_id=2"><i class="glyphicon glyphicon-book"></i>Hotel 2</a>  
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.php">Blank Page</a>
                        </li>
                        <li>
                            <a href="/root5/admin/template/logout.php">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>