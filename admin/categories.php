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
                    <div class="col-sm-6">
                      
                       <?php insert_categories(); ?>
                       
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submitCat" value="Add Category" class="btn btn-primary">
                            </div>
                        </form>
                        
                        <?php //gets the edit id
                            get_edit_link();
                        
                        ?>
                        
                    </div><!--ends add category -->
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY TITLE</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php //delete category
                                    delete_categories();
                                ?>
                              <?php include "includes/preview.php"; ?>
                                
                                   
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
        <!--for footer -->
    <?php include "includes/footer.php";?>
