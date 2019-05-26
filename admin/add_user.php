<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
if ($role != '0') {
    echo"<script>window.location='index.php';</script>";
}
?> 

<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>
        <?php
        if (isset($_POST['submit'])) {
            $user_name = mysqli_real_escape_string($db->link, $fm->validation($_POST['user_name']));
            $password = mysqli_real_escape_string($db->link, $fm->validation(md5($_POST['password'])));
            $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
            $role = mysqli_real_escape_string($db->link, $fm->validation($_POST['role']));



            if ($user_name == "" || $password == "" || $role == "" || $email == "") {
                echo 'Field must not be empty !';
            } else {
                $query = "SELECT * FROM tbl_users WHERE email = '$email' limit 1";
                $checkMail = $db->select($query);
                if ($checkMail) {
                    echo 'Email Address already Exists!';
                } else {
                    $query = "INSERT INTO tbl_users(user_name,email,password,role) VALUES('$user_name','$email','$password','$role')";
                    $inserted_rows = $db->insert($query);
                    if ($inserted_rows) {
                        echo "<span class='success'>User Created Successfully.  </span>";
                    } else {
                        echo "<span class='error'>User Not Created !</span>";
                    }
                }
            }
        }
        ?>
        <div class="block">               
            <form action="" method="post">
                <table class="form">

                    <tr>
                        <td>
                            <label> User Name</label>
                        </td>
                        <td>
                            <input type="text" name="user_name" placeholder="Enter User Name ..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password ..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Valid Email ..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>User Role</label>
                        </td>
                        <td>
                            <select id="select" name="role">
                                <option>---Select User Role---</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>




