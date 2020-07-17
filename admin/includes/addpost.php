<?php
    addpost();
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    
    <div class="form-group">
       <label for="">Post Category</label>
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
        <input type="file" name="image" >
    </div>
    
    <div class="form-group">
        <label for="con">Post Content</label>
        <textarea name="content" class="form-control" id="con" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <label for="">Post Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Status</label>
        <input type="text" name="status" class="form-control">
    </div>
    <input type="submit" name="createpost" class="btn btn-primary" value="Publish Post">
</form>