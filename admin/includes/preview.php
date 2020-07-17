 <?php 
    $query = "SELECT * FROM categories";
    $cat_query = mysqli_query($connection, $query);
      while($row = mysqli_fetch_array($cat_query)){
          $cat_id =$row["cat_id"];
          $cat_title =$row["cat_title"];
    ?>

    <tr>
        <td><?php echo $cat_id; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><a class="btn btn-primary" href="categories.php?delete='<?php echo $cat_id;?>'">Delete</a></td> 
        <td><a class="btn btn-warning" href="categories.php?edit='<?php echo $cat_id;?>'">Edit</a></td>
    </tr>
<?php } ?>