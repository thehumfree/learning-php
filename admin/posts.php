<?php include "includes/header.php"; ?>
    
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                    </div>
                </div><!--</row>-->
                <div class="row">
                    <?php 
                        if(isset($_GET["source"])){
                            $source = $_GET["source"];
                        }else{
                            $source = "";
                        }
                        switch($source){
                            case "addpost":
                                include "includes/addpost.php";
                                break;
                            case "editpost":
                                include "includes/editpost.php";
                                break;
                            
                                
                            default:
                                deletepost();
                               include "includes/view_allpost.php";
                               break;
                        }
                    ?>
                </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
        <!--for footer -->
    <?php include "includes/footer.php";?>
