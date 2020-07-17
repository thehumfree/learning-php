<?php 
    if(isset($_GET["pid"])){
        $id = $_GET["pid"];
        $query = "SELECT * FROM posts WHERE post_id = {$id}";
        $edit_query = mysqli_query($connection, $query);
        confirm($edit_query);
        while($row = mysqli_fetch_assoc($edit_query)){
            $id = $row["post_id"];
            $title = $row["post_title"];
            $category = $row["post_category_id"];
            $author = $row["post_author"];
            $tags = $row["post_tags"];
            $comments = $row["post_comment_count"];
            $status = $row["post_status"];
            $image = $row["post_image"];
            $content = $row["post_content"];
         }
        
        //for update
        if(isset($_POST["updatepost"])){
            $title = $_POST["title"];
            $author = $_POST["author"];
            $category = $_POST["category"];
            $image = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $content = $_POST["content"];
            $author = $_POST["author"];
            $tags = $_POST["tags"];
            $status = $_POST["status"];
            $date = date("d-m-y");
            move_uploaded_file($image_tmp, "../images/$image");
            
            //selecting image from the database if image is empty
            if(empty($image)){
                $query="SELECT * FROM posts WHERE post_id = $id";
                $img_query = mysqli_query($connection, $query);
                confirm($img_query);
                while($row = mysqli_fetch_assoc($img_query)){
                    $image = $row["post_image"];
                }  
            }//ends image retrieval
            
            //update query
            $query ="UPDATE posts SET ";
            $query.= "post_category_id ='{$category}', ";
            $query.= "post_title ='{$title}', ";
            $query.= "post_author ='{$author}', ";
            $query.= "post_date =now(), ";
            $query.= "post_image ='{$image}', ";
            $query.= "post_content ='{$content}', ";
            $query.= "post_tags ='{$tags}', ";
            $query.= "post_status ='{$status}' ";
            $query.= "WHERE post_id = {$id}";
            
            $update_query = mysqli_query($connection, $query);
            confirm($update_query);
            
        }
    }
?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Author</label>
        <input type="text" name="author" value="<?php echo $author; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <select name="category" id="">
            <?php
            $query ="SELECT * FROM categories";
                $cat_query = mysqli_query($connection, $query);
                confirm(cat_query);
                while($row = mysqli_fetch_array($cat_query)){
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
            
        </select>
           
    </div>
    
    <div class="form-group">
        <label for="">Post Image</label>
        <img src="../images/<?php echo $image ;?>" width="100" alt="">
        <input type="file"  name="image" >
    </div>
    
    <div class="form-group">
        <label for="con">Post Content</label>
        <textarea name="content" class="form-control" id="con" cols="30" rows="10"><?php echo $content; ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="">Post Tags</label>
        <input type="text" name="tags" value="<?php echo $tags; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Status</label>
        <input type="text" name="status" value="<?php echo $status; ?>" class="form-control">
    </div>
    <input type="submit" name="updatepost" class="btn btn-primary" value="Update Post">
</form>