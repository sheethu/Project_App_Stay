<?php
/**
    * Admin Offers Page for App Stay
    *
    * Details about the Add and edit new offers in this page by the admin
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
                    $data1=get_all_emp($page_id);   
                } 
            else          
                header("location:/root5/admin/template/index.php"); 
        }

    if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            delete($id);
        } 
    if(isset($_GET['msg']))
        {
            $message=$_GET['msg'];
?>                                
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
<?php               
                    echo $message;
?>                  
                </div>
<?php
        }  
    if(empty($_POST)===false)
        {
            if(empty($_POST['offered'])||empty(trim($_POST['description'])))
                {
?>                    
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>Add some offers and descriptions
                    </div>
 <?php                  
                }
            else
                {
                    $title=$_POST['offered'];
                    $offer=$_POST['description'];
                    $data=array($page_id,$title,$offer);
                   
                    if($data)
                        {   
                            $add=add_data($data); 
                            header('location:hotel1_galery.php?page_id=1 && msg=Add Offers Successfully'); 
                        }
                    else if(empty($_POST['offered']) || empty($_POST['description']))
                        {
?>                           
                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><?php echo "Add offers and descriptions "; ?></div>
<?php
                        }               
                }

        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel1 Name</title>
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
</head>
<body>
    <div id="wrapper">
<?php 
    require 'includes/header.php'; 
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hotel1 Resturant
                    </h1>
                </div>
               <!-- /.col-lg-12 -->
               <!-- Header -->
                <header id="head">
                    <div class="container">
                        <div class="row">
                            <form action="hotel1_galery.php?page_id=1" method="post" class="col-sm-4" role="form">
                            <div class="form-group has-info">
                                <input type="hidden" name="id" value="<?php echo $val->offer_id;?>">
                                <label class="control-label" for="inputSuccess">Offer title
                                </label>
                                <input type="text" class="form-control" name="offered" id="offered">
                                <label class="control-label" for="inputSuccess">Offer Description
                                </label>
                                <textarea id="description" name="description"  class="form-control " rows="3" required="offer description is required">
                                </textarea>
                                <br>  
                                <button type="submit" class="btn btn-primary">
                                <span>SUBMIT
                                </span>
                                </button>
                            </div>
                            </form>
                        </div>   
                    </div>                     
                </header>
            </div>
            <div>   
                <h2 class="text-center"> OUR NEW OFFERS.......</h2>
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead>
                        <tr class="bg-default">
                            <th class="text-center">OFFER TITLE</th> 
                            <th class="text-center">OFFER DESCRIPTION</th> 
                            <th></th>
                        </tr>
                    </thead>
<?php
    foreach ($data1 as $val)
        { 
?>
                        <tr class="bg-default">
                            <td>
<?php  
                                echo "<br>";                 
                                echo $val['offers_name'];
 ?>
                            </td>
                            <td>
<?php  
                                echo "<br>";                
                                echo $val['offers_description'];                           
 ?>
                            </td>
                            <td>
                                <a href="hotel1_galery.php?page_id=1&&id=<?php echo $val['offer_id'];?> && msg=Delete successfully" >
                                <button type="submit" class="btn btn-primary">
                                <span> DELETE
                                </span>
                                </button>
                                </a>&nbsp
                                <a href="hotel1_galery_edit.php?page_id=1&&id=<?php echo $val['offer_id'];?> &&  msg=Edit successfully" >
                                <button type="submit" class="btn btn-primary">
                                <span> EDIT
                                </span>
                                </button>
                                </a>
                                <br>
                            </td>
 <?php 
        }
?>
                        </tr> 
                </table>
            </div>
        </div>
    </div>
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