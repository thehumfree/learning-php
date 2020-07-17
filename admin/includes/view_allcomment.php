<table class="table table-bordered table-hover">
    <thead>
       <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comments</th>
        <th>Post Title</th>
        <th>Email</th>
        <th>Status</th>
        <th>Date</th>
        <th>Unapprove</th> 
        <th>Approve</th>
       </tr>

    </thead>
    <tbody>
        <?php
          $query = "SELECT * FROM comment";
        $prev_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($prev_query)){
        $id = $row["id"];
        $author = $row["com_author"]; 
        $post_id = $row["com_post_id"];
        $content = $row["com_content"];
        $email = $row["com_email"];
        $status = $row["status"];
        $date = $row["com_date"];
        
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$content}</td>";
        $query = "SELECT * FROM posts WHERE post_id= {$post_id}";
        $post_query = mysqli_query($connection, $query);
            if(!$post_query){
                die("query not working".mysqli_error($connection));
            }
        while($row = mysqli_fetch_assoc($post_query)){
            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            echo "<td><a href='../post.php?pid={$post_id}'>{$post_title}</a></td>";
        }
        
        echo "<td>{$email}</td>";
        echo "<td>{$status}</td>";
        echo "<td>{$date}</td>";
        echo "<td><a class='btn btn-warning' href='comment.php?unapprove={$id}'>Unapprove</a></td>";
        echo "<td><a class='btn btn-warning' href='comment.php?approve={$id}'>Approve</a></td>";
        echo "<td><a class='btn btn-danger' href='comment.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    } 

        ?>
    </tbody>
</table>
<?php
//for deleting comment
    if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $query = "DELETE FROM comment WHERE id = {$id}";
    $sql = mysqli_query($connection, $query);
    $upquery = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = {$id}";
    $upsql = mysqli_query($connection, $query);
    header("Location: comment.php");
        
}

//for approving comment
    if(isset($_GET["approve"])){
        $id = $_GET["approve"];
        $query = "UPDATE comment SET status = 'Approved' WHERE id = {$id}";
        $sql = mysqli_query($connection, $query);
        header("Location: comment.php");
    }

//for unapproving comment
    if(isset($_GET["unapprove"])){
        $id = $_GET["unapprove"];
        $query = "UPDATE comment SET status = 'Unapproved' WHERE id = {$id}";
        $sql = mysqli_query($connection, $query);
        header("Location: comment.php");
    }
?>