<?php
/**
    * Servicing Page for App Stay
    *
    * Details about the services of the hotel from App
    *
    * LICENSE: Root5 
    *
    * @copyright  Copyright (c) 2005-2015 Root5  (http://www.root5solutions.com)
    * @license    http://www.root5.com/license   BSD License
    * @version    1.0.0  
    * @since      File available since Release 1.0.0
    * @author     sheethal
    */
    require 'core/init.php';
    is_logged_in();
    if(isset($_GET['page_id']))
        {
            if($_GET['page_id']==1||$_GET['page_id']==2)
                {
                    $page_id=$_GET['page_id']; 
                } 
            else          
                header("location:/root5/admin/template/index.php");       
        }
    if(isset($_GET['msg']))
        {
            $message=$_GET['msg'];
?>
                                
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
<?php               
                    echo $message;
?>                  </div>
<?php
        }
    if(isset($_POST["current_status"])) 
        {
            $servicer_id=$_POST["servicer_id"];
            $servicer_name=$_POST["servicer_name"];
            $servicer_email=$_POST["servicer_email"];
            $servicer_checkin=$_POST["servicer_checkin"];
            $servicer_checkout=$_POST["servicer_checkout"];
            $servicer_requestdate=$_POST["servicer_requestdate"];
            $servicer_detail=$_POST["servicer_detail"];
            $servicer_contact=$_POST["servicer_contact"];
            $servicer_priority=$_POST["servicer_priority"];
            $servicer_status=$_POST["current_status"];  
            $update1=update($page_id,$servicer_name,$servicer_email,$servicer_checkin,$servicer_checkout,$servicer_requestdate,$servicer_detail,$servicer_contact,$servicer_priority,$servicer_status,$servicer_id);
            if($update1)
                {
                    header("location:hotel1_service.php?page_id=1 && msg=Status Updated Sucessfully "); 
                } 
        }
            foreach ($errors as $value)
                {
                    echo $value;
                }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Servicing Page Hotel 1</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .panel-heading a:after 
        {
            font-family:'Glyphicons Halflings';
            content:"\e114";
            float: right;
            color: grey;
        }
    .panel-heading a.collapsed:after 
        {
            content:"\e080";
        }
</style>
</head>
<body>
    <div id="wrapper">
<?php
    require 'includes/header.php'; 
?>
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Servicing Hotel 1</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <div class="row">
            <!--notes of bookings -->
                <div class="container">
                    <div class="panel-group col-sm-8" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php
    $data=get_all_servicing_order($page_id);  
    foreach ($data as $value) 
        {             
?>
                                <h2 class="panel-title text-center panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $value['service_id'];?>"><?php echo $value['servicer_name'];?></a>
                                </h2>           
                                <div id="<?php echo $value['service_id'];?>" class="panel-collapse collapse out">
                                    <div class="panel-body text-justify">
                                       <table class="table">
                                            <tr>
                                                <th>
<?php
                                                    echo "Email:";
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_email']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Check In Date:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_checkin']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Check Out Date:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_checkout']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Bookers Details:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_detail']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Contacts:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_contact']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Request Date:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_requestdate']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Priority:"; 
?>
                                                </th>
                                                <td>
<?php 
                                                    echo $value['servicer_priority']; 
?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Status:"; 
?>
                                                </th>
                                                <td>
                                                    <form role="form" method="post" action="hotel1_service.php?page_id=1">
                                                    <input type="hidden" name="servicer_id" value="<?php echo $value['service_id']?>">
                                                    <input type="hidden" name="servicer_name" value="<?php echo $value['servicer_name']?>">
                                                    <input type="hidden" name="servicer_email" value="<?php echo $value['servicer_email']?>">
                                                    <input type="hidden" name="servicer_checkin" value="<?php echo $value['servicer_checkin']?>">
                                                    <input type="hidden" name="servicer_checkout" value="<?php echo $value['servicer_checkout']?>">
                                                    <input type="hidden" name="servicer_requestdate" value="<?php echo $value['servicer_requestdate']?>">
                                                    <input type="hidden" name="servicer_detail" value="<?php echo $value['servicer_detail']?>">
                                                    <input type="hidden" name="servicer_contact" value="<?php echo $value['servicer_contact']?>">
                                                    <input type="hidden" name="servicer_priority" value="<?php echo $value['servicer_priority']?>"> 
                                                    <label class="radio-inline">
                                                    <input type="radio" <?php if($value['status']=="Complete") {?> checked="checked"<?php } ?> name="current_status" value="Complete">Complete
                                                    </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" <?php if($value['status']=="Ongoing") {?> checked="checked"<?php } ?> name="current_status" value="Ongoing">Ongoing
                                                    </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" <?php if($value['status']=="Rejected") {?> checked="checked"<?php } ?> name="current_status" value="Rejected">Rejected
                                                    </label>
                                                    <button type="submit" class="btn btn-default">
                                                    <span>Status
                                                    </span>
                                                    </button>   
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
<?php 
                                                    echo "Latest Status:" 
?>
                                                </th>
                                                <td>
<?php
                                                    echo $value['status'];
?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
<?php
        } 
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
<script type="text/javascript">
    window.addEventListener('load', function(){
    var checkedValues= [];
    var chs = document.getElementsByTagName('input');
    for(var i = 0; i < chs.length; i++)
        if(chs[i].type.toLowerCase() === 'checkbox' && chs[i].checked)
            checkedValues.push(chs[i].value);
<?php 
    echo $var; 
?>
    });
</script>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>