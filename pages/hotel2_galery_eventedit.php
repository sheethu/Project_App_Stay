<?php
/**
    *  Admin Edit Page for App Stay
    *
    * Details to Edit the Events by this page
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
        $id=(isset($_GET['id']))?$_GET['id']:'';
        $val=view_data1_event($id);
        if (isset($_POST["events"]) && isset($_POST["description"])) 
            {
                $id=$_POST["id"]; 
                $title=$_POST["events"];
                $description=$_POST["description"];
                if(isset($_FILES['images']['name']) && !empty($_FILES['images']['name']))
                    {
                        $filetmp=$_FILES["images"]["tmp_name"];
                        $filename=$_FILES["images"]["name"];
                        $filetype=$_FILES["images"]["type"];
                        $filepath= "photo2/".$filename;
                        move_uploaded_file($filetmp,$filepath);
                    }
                else
                    {
                        $filepath=$_POST["old_image_path"];
                    }
                $update1=update_query($page_id,$title,$description,$filepath,$id);
                if($update1)
                    {
                       header("location:hotel2_galery_event.php?page_id=2&&msg=Edit Successfully");
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Page</title>
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
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Hotel2 events</h1>
                    </div>
                    <form action="hotel2_galery_eventedit.php?page_id=2&&msg=Update_sucessfully" method="post" class="col-sm-4" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $val->event_id;?>">
                    <div class="form-group has-info">
                    <label class="control-label" for="inputSuccess">Event title</label>
                    <input type="text" class="form-control" name="events" value="<?php echo $val->event_title;?>">
                    </div>                                   
                    <div class="form-group has-info">
                    <label>Event Description</label>
                    <textarea name="description" class="form-control text-left" rows="3"><?php echo $val->event_description;?></textarea>
                    </div>
                    <div class="form-group has-info">
                    <label>Event Related images</label>
                    <input type="hidden" name="old_image_path" value="<?php echo $val->image_path?>">
                    <input type="file" name="images">
                    </div>
                    <button type="submit" class="btn btn-primary">
                    <span>UPDATE</span>
                    </button> 
                    </form>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
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