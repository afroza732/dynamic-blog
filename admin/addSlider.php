<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
    
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $folder = "images/slider/" . $unique_image;


            if ($title == "" ||  $file_name == "") {
                echo 'Field must not be empty !';
            } elseif ($file_size > 1048567) {
                echo "<span class='error'>Image Size should be less then 1MB! </span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
            } else {
                move_uploaded_file($file_temp, $folder);
                $query = "INSERT INTO  tbl_slider(title,image) VALUES('$title','$folder')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                    echo "<span class='success'>Image Uploaded Successfully.  </span>";
                } else {
                    echo "<span class='error'>Image Not  Uploaded !</span>";
                }
            }
        }
        ?>
        <div class="block">               
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Slider Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image"/>
                        </td>
                    </tr
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>

