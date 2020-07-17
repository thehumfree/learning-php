<table class="table table-bordered table-hover">
    <thead>
       <tr>
        <th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
       </tr>

    </thead>
    <tbody>
        <?php
          $query = "SELECT * FROM users";
        $prev_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($prev_query)){
        $id = $row["id"];
        $username = $row["username"]; 
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $email = $row["email"];
        $image = $row["image"];
        $role = $row["role"];
        
        
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$firstname}</td>";
        echo "<td>{$lastname}</td>";
        echo "<td>{$email}</td>";
        echo "<td><img src='{$image}' width='100px' class='img-responsive' height='50px'/></td>";
        echo "<td>{$role}</td>";
        echo "<td><a class='btn btn-warning' href='user.php?source=edituser&pid={$id}'>edit</a></td>";
        echo "<td><a class='btn btn-danger' href='user.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    } 

        ?>
    </tbody>
</table>
<?php
//for deleting comment
    if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $query = "DELETE FROM users WHERE id = {$id}";
    $sql = mysqli_query($connection, $query);
    header("Location: user.php");
        
}

?>