<?php 
function confirm($result){
    if(!$result){
        global $connection;
        die("Query not processed ". mysqli_error($connection));
    }
}
function insert_categories(){
    global $connection;
    if(isset($_POST["submitCat"])){
        $cat_title = $_POST["cat_title"];
        if(empty($cat_title) || $cat_title == ""){
            echo "Field must not be empty";
        }else{
            $query ="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $cat_query = mysqli_query($connection, $query);
            if(!$_POST["submitCat"]){
                die("query wasnt passed" . mysqli_error($connection));
            }
        }
    }
}


function delete_categories(){
    global $connection;
    if(isset($_GET["delete"])){
        $cat_id = $_GET["delete"];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $cat_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function get_edit_link(){
    global $connection;
    if(isset($_GET["edit"])){
        $cat_id = $_GET["edit"];
        include "includes/update_categories.php";

    }
}
   
function previewPost(){
    global $connection;
    $query = "SELECT * FROM posts";
    $prev_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($prev_query)){
        $id = $row["post_id"];
        $title = $row["post_title"]; 
        $category = $row["post_category_id"];
        $author = $row["post_author"];
        $tags = $row["post_tags"];
        $comments = $row["post_comment_count"];
        $status = $row["post_status"];
        $image = $row["post_image"];
        $date = $row["post_date"];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$title}</td>";
        echo "<td><img src='../images/{$image}' width='100px' height='100px' /></td>";
        $query = "SELECT * FROM categories  WHERE cat_id= {$category}";
        $cat_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($cat_query)){
            $cat_title = $row["cat_title"];
            echo "<td>{$cat_title}</td>";
        }
        
        echo "<td>{$tags}</td>";
        echo "<td>{$comments}</td>";
        echo "<td>{$status}</td>";
        echo "<td>{$date}</td>";
        echo "<td><a class='btn btn-warning' href='posts.php?source=editpost&pid={$id}'>Edit</a></td>";
        echo "<td><a class='btn btn-danger' href='posts.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deletepost(){
    global $connection;
    if(isset($_GET["delete"])){
        $id = $_GET["delete"];
        $query = "DELETE FROM posts WHERE post_id = {$id} ";
        $delete_query = mysqli_query($connection, $query);
        confirm($delete_query);
    }
    
    
}

function addpost(){
    global $connection;
    if(isset($_POST["createpost"])){
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
        //to upload image in location
        move_uploaded_file($image_tmp, "../images/$image");
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
        $query .="VALUE('{$category}','{$title}','{$author}',now(), '{$image}', '{$content}', '{$tags}', '{$status}')";
        $addpost_query = mysqli_query($connection, $query);
        confirm($addpost_query);
    }
    
}

function adduser(){
    global $connection;
    if(isset($_POST["createuser"])){
        $username = $_POST["uname"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $role = $_POST["role"];
        
       //to upload image in location
        move_uploaded_file($image_tmp, "../images/$image");
        
        $query = "INSERT INTO users(username, first_name, last_name, email, password, image, role)";
        $query .="VALUE('{$username}','{$fname}','{$lname}', '{$email}', '{$password}', '{$image}', '{$role}')";
        $adduser_query = mysqli_query($connection, $query);
        confirm($adduser_query);
    }
    
}
?>