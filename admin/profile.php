<?php include "includes/header.php"; ?>
<?php
if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query="SELECT * FROM users WHERE email ='{$email}'";
    $sql = mysqli_query($connection, $query);
    confirm($sql);
    while($row = mysqli_fetch_array($sql)){
        $id = $row["id"];
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $uname = $row["username"];
        $email = $row["email"];
        $password = $row["password"];
        $image = $row["image"];
        $role = $row["role"];
    }
     //for update
        if(isset($_POST["updateprofile"])){
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $uname = $_POST["uname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $image = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $role = $_POST["role"];
            
            move_uploaded_file($image_tmp, "../images/$image");
            
            //selecting image from the database if image is empty
            if(empty($image)){
                $query="SELECT * FROM users WHERE id = $id";
                $img_query = mysqli_query($connection, $query);
                confirm($img_query);
                while($row = mysqli_fetch_assoc($img_query)){
                    $image = $row["image"];
                }  
            }//ends image retrieval
            
            //update query
            $query ="UPDATE users SET ";
            $query.= "username ='{$uname}', ";
            $query.= "first_name ='{$fname}', ";
            $query.= "last_name ='{$lname}', ";
            $query.= "email ='{$email}', ";
            $query.= "password ='{$password}', ";
            $query.= "image ='{$image}', ";
            $query.= "role ='{$role}' ";
            $query.= "WHERE id = {$id}";
            
            $update_query = mysqli_query($connection, $query);
            confirm($update_query);
            
        }
}

?>
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
                    
                </div>
                <!-- /.row -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" value="<?php echo $fname; ?>" name="fname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" value="<?php echo $lname; ?>" name="lname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">UserName</label>
        <input type="text" value="<?php echo $uname; ?>" name="uname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="con">Email</label>
        <input type="email" value="<?php echo $email; ?>" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" value="<?php echo $password; ?>" name="password" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Image</label>
        <img src="<?php echo image; ?>" width="50px" height="50px" alt="">
        <input type="file" name="image" >
    </div>
    <div class="form-group">
        <label for="">Role</label>
        <select name="role" id="">
           <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
               <?php
                    if($role == "Admin"){
                      echo "<option value='Subscriber'>Subscriber</option>" ;
                    }else{
                        echo "<option value='Admin'>Admin</option>" ;
                    }
            
                ?>
        </select>
    </div>
    
    <input type="submit" name="updateprofile" class="btn btn-primary" value="Update Profile">
</form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <!--for footer -->
    <?php include "includes/footer.php";?>
