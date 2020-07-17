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
                            Welcome <?php echo $_SESSION["email"]; ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

           <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <?php
                    $query ="SELECT * FROM posts";
                    $selectPost= mysqli_query($connection, $query);
                    $post_count = mysqli_num_rows($selectPost);
                        echo "<div class='huge'>{$post_count}</div>";
                  ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
                    $query ="SELECT * FROM comment";
                    $selectComment= mysqli_query($connection, $query);
                    $comment_count = mysqli_num_rows($selectComment);
                        echo "<div class='huge'>{$comment_count}</div>";
                  ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query ="SELECT * FROM users";
                    $selectUsers= mysqli_query($connection, $query);
                    $user_count = mysqli_num_rows($selectUsers);
                        echo "<div class='huge'>{$user_count}</div>";
                  ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="./user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
                    $query ="SELECT * FROM categories";
                    $selectCategories= mysqli_query($connection, $query);
                    $cat_count = mysqli_num_rows($selectCategories);
                        echo "<div class='huge'>{$cat_count}</div>";
                  ?> 
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="./categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
          <?php
              $query = "SELECT * FROM posts WHERE post_status = 'Draft'";
              $pendingpost = mysqli_query($connection, $query);
              $pendingpost_count = mysqli_num_rows($pendingpost);
                
              $query = "SELECT * FROM users WHERE role = 'Admin'";
              $admin = mysqli_query($connection, $query);
              $admin_count = mysqli_num_rows($admin);
                
//              $query = "SELECT * FROM comment WHERE status = 'Unapproved'";
//              $unapprove = mysqli_query($connection, $query);
//              $unapprove_count = mysqli_num_rows($unapprove);
            ?>
           <div class="row" >
               <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawStuff);

                  function drawStuff() {
                    var data = new google.visualization.arrayToDataTable([
                      ['Data', 'Count'],
                    <?php
                      $elementdata = ['POST', 'PENDING POST', 'USER', 'ADMINS', 'COMMENTS', 'CATEGORIES'];
                      $elementcount = [$post_count, $pendingpost_count, $user_count, $admin_count, $comment_count, $cat_count];
                      
                        for($i = 0; $i<6; $i++){
                            echo "['{$elementdata[$i]}', {$elementcount[$i]}],";
                        }
                    ?>
                      
                      
                      
                    ]);

                    var options = {
                      width: "100%",
                      legend: { position: 'none' },
                      chart: {
                        title: 'DASHBOARD MENUS',
                        subtitle: '' },
                      axes: {
                        x: {
                          0: { side: 'top', label: ''} // Top x-axis.
                        }
                      },
                      bar: { groupWidth: "50%" }
                    };

                    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                    // Convert the Classic options to Material options.
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  };
                </script>
                
             <div id="top_x_div" style="width: auto; height: 600px;"></div>
           </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <!--for footer -->
    <?php include "includes/footer.php";?>
