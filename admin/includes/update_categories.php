<?php //update category

    if(isset($_POST["update_Cat"])){
        $cat_title = $_POST["cat_title"];
        $cat_id = $_GET["edit"];
        $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
        $cat_query = mysqli_query($connection, $query);
    }
?>
   <form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Update Category</label>
        <?php 
            if(isset($_GET["edit"])){
                $query ="SELECT * FROM categories WHERE cat_id = $cat_id";
                $cat_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($cat_query)){
                    //$cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];
        ?>
              <input value="<?php if(isset($cat_id)){echo $cat_title;}?>" type="text" name="cat_title"  class="form-control">
               <?php  }}
                ?>

    </div>
    <div class="form-group">
        <input type="submit" name="update_Cat" value="Update Category" class="btn btn-primary">
    </div>
</form>
