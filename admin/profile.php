<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php
        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $user_name = mysqli_real_escape_string($db->link, $_POST['user_name']);
            $email = mysqli_real_escape_string($db->link, $_POST['email']);
            $description = mysqli_real_escape_string($db->link, $_POST['user_description']);


            if ($name == "" || $user_name == "" || $email == "" || $description == "") {
                echo 'Field must not be empty !';
            }
            $query = "UPDATE tbl_users SET "
                    . "name ='$name',"
                    . "user_name='$user_name',"
                    . "email='$email',"
                    . "user_description='$description'"
                    . "WHERE user_id = '$user_id' ";
            $updated_rows = $db->update($query);
            if ($updated_rows) {
                echo "<span class='success'>Data updated Successfully.  </span>";
            } else {
                echo "<span class='error'>Data Not updated !</span>";
            }
        }
        ?>
        <div class="block">   
            <?php
            $query = "SELECT * FROM tbl_users WHERE user_id = '$user_id' AND role = '$role'";
            $getPost = $db->select($query);

            if ($getPost) {
                while ($result = $getPost->fetch_assoc()) {
                    ?>
                    <form action="" method="post">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['name']; ?>" name="name" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            <tr>
                                <td>
                                    <label>User Name</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['user_name']; ?>" name="user_name" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input type="email" value="<?php echo $result['email']; ?>" name="email" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Content</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name="user_description"><?php echo $result['user_description']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update Post" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }
            }
            ?>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>


