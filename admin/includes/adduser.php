<?php
    adduser();
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" name="fname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" name="lname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">UserName</label>
        <input type="text" name="uname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="con">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="image" >
    </div>
    <div class="form-group">
        <label for="">Role</label>
        <select name="role" id="">
            <option value="subscriber">Select Option</option>
            <option value="Admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <input type="submit" name="createuser" class="btn btn-primary" value="Add User">
</form>