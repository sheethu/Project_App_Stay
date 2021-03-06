<?php
/**
    * Admin Events Page for App Stay
    *
    * Details about the booking services and their specials
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
?>                  
                    </div>
<?php
        }
    if(empty($_POST)===false)
        {
            if(empty($_POST['events'])===true||empty($_POST['description'])===true||empty($_FILES['images']['name']))
                {
?>                    
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>Add some events and descriptions
                    </div>
 <?php       
                }  
            else
                if (isset($_POST["events"])&&isset($_POST["description"])) 
                    {
                        $event_title=$_POST["events"];
                        $description=$_POST["description"];
                        $filetmp=$_FILES["images"]["tmp_name"];
                        $filename=$_FILES["images"]["name"];
                        $filetype=$_FILES["images"]["type"];
                        $filepath= "photo2/".$filename;
                        move_uploaded_file( $filetmp,$filepath);
                        $data=array($page_id,$event_title,$description,$filepath);
                        $add=add_data_event($data);
                        if($add)
                            {          
                                header('location:hotel2_galery_event.php?page_id=2 && msg=Add Offers Successfully'); 
                            }
                        foreach ($errors as $value)
                            {
                                echo $value;
                            }
                    }
        }   
        if(isset($_GET['file']))
        {
             unlink($_GET['file']);
        }          
    if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            delete_event1($id);
           
            header('location:hotel2_galery_event.php?page_id=2 && msg=Delete Successfully');
        }
    $data1=get_all_event($page_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon1.png">
    <title>Hotel2 Name</title>
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
                    <h1 class="page-header">Hotel2 Resturant</h1>
                </div>
                <!-- /.col-lg-12 -->
                <!-- Header -->
              <header id="head">
                    <div class="container">
                        <div class="row">
                            <form action="hotel2_galery_event.php?page_id=2" method="post" class="col-sm-4" enctype="multipart/form-data">
                            <div class="form-group has-info">
                            <label class="control-label" for="inputSuccess">Event title</label>
                            <input type="text" class="form-control" name="events" id="events">
                            </div>                                   
                            <div class="form-group has-info">
                            <label>Event Description</label>
                            <textarea id="description" name="description" placeholder="Event Description" class="form-control " rows="3"></textarea><br><br>
                            </div>
                            <div class="form-group has-info">
                            <label>Event Related images</label>
                            <input type="file" name="images"><br>
                            </div>
                            <button type="submit" class="btn btn-primary">
                            <span>SUBMIT</span>
                            </button> 
                            </form>
                        </div>   
                    </div>  
                </header>
              <div> 
                    <h2 class="text-center"> OUR NEW EVENTS.......</h2>
                </div>
              <div>
                  <table class="table table-striped table-bordered table-hover text-center">
                        <tr class="bg-default">
                            <th>EVENT TITLE</th> 
                            <th>EVENT DESCRIPTION</th> 
                            <th>EVENT RELATED IMAGES</th>
                            <th></th>
                        </tr>
<?php
    foreach ($data1 as $val)
        { 
?>
                        <tr class="bg-default">
                            <td>
<?php  
                            echo "<br>";                                            
                            echo $val['event_title'];
                           
 ?>
                            </td>
                            <td>
<?php  
                            echo "<br>";                 
                            echo $val['event_description'];
                            
 ?>
                            </td>
                            <td>
<?php 
                            echo "<img border=\"0\" src=\"".$val['image_path']."\" width=\"102\"  height=\"91\">";
?>
                            </td>
                            <td>   
                            <a href="hotel2_galery_event.php?page_id=2&&id=<?php echo $val['event_id'];  ?> && msg=Delete Successfully  && file=<?php echo $val['image_path'] ?>">
                            <button type="submit" class="btn btn-primary">
                            <span> DELETE</span>
                            </button>
                            </a>&nbsp
                            <a href="hotel2_galery_eventedit.php?page_id=2&&id=<?php echo $val['event_id']; ?> && msg=Edit Successfully" >
                            <button type="submit" class="btn btn-primary">
                            <span> EDIT</span>
                            </button>
                            </a><br>
                            </td>
<?php
        }
?>
                        </tr> 
                    </table>
            </div>
            </div>
            <!-- /.row -->
            <div class="row">  
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script type="text/javascript">
    function deleteImage(file_name)
{
    var r = confirm("Are you sure you want to delete this Image?")
    if(r == true)
    {
        $.ajax({
          url: 'hotel2_galery_event.php',
          data: {'file' : "<?php echo dirname(__FILE__) . '/photo2/'?>" + file_name },
          success: function (response) {
             // do something
          },
          error: function () {
             // do something
          }
        });
    }
}</script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>