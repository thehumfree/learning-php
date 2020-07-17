    <?php include "includes/db.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               
               <?php
                if(isset($_GET["pid"])){
                    $pid= $_GET["pid"];
                    $query = "SELECT * FROM posts WHERE post_id = $pid";
                    $select_post = mysqli_query($connection, $query);
                        
                        while($row = mysqli_fetch_array($select_post)){
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_content = $row["post_content"];
                            
                     //closing the first loop through        
                 ?>           
                
                
                            
                 <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                
                <hr>     
                  <?php    }} //closing the entire loop?>
               
                <!-- Blog Comments -->

               <?php
                    if(isset($_POST["comment"])){
                        $post_id = $_GET["pid"];
                        $author = $_POST["author"];
                        $email = $_POST["email"];
                        $content = $_POST["content"];
                        
                        $query = "INSERT INTO comment (com_post_id, com_email, com_author, com_content, com_date, status)";
                        $query.= "VALUE ({$post_id}, '{$email}', '{$author}', '{$content}',now(), 'Unapproved')";
                        $comment =mysqli_query($connection, $query);
                        if(!$comment){
                            die("Query not performed".mysqli_error($connection));
                        }
                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$post_id}";
                        $sql = mysqli_query($connection, $query);
                    }
                ?>
               
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>  
                        <div class="form-group">
                            <label for="author">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>  
                        <div class="form-group">
                            <label for="author">Comment</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                        $id = $_GET["pid"];
                        $query = "SELECT * FROM comment WHERE com_post_id = {$pid} AND status = 'Approved' ORDER BY id DESC";
                        $sql = mysqli_query($connection, $query);
                        if(!$sql){
                            die("query not performed".mysqli_error($connection));
                        }
                        while($row = mysqli_fetch_array($sql)){
                            $email = $row["com_email"];
                            $date = $row["com_date"];
                            $content = $row["com_content"];
                 ?>   
                            <!-- Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $email; ?>
                                        <small><?php echo $date; ?></small>
                                    </h4>
                                    <?php echo $content; ?>
                                </div>
                            </div>
                   <?php } ?>
                
               
               

                

                


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>