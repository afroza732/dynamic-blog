<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>

<?php
$slider_id = mysqli_real_escape_string($db->link, $_GET['slider_id']);
if (!isset($slider_id) && $slider_id == NULL) {
    header('Location: sliderList.php');
} else {
    $slider_id = $slider_id;
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Updated Slider</h2>
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
            $folder = "images/slider" . $unique_image;


            if ($title == "") {
                echo 'Field must not be empty !';
            }
            if (!empty($file_name)) {

                if ($file_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($file_temp, $folder);
                    $query = "UPDATE tbl_post SET title ='$title', image='$folder' WHERE id = '$slider_id' ";
                    $updated_rows = $db->update($query);
                    if ($updated_rows) {
                        echo "<span class='success'>Data updated Successfully.  </span>";
                    } else {
                        echo "<span class='error'>Data Not updated !</span>";
                    }
                }
            } else {
              $query = "UPDATE tbl_slider SET title ='$title' WHERE id = '$slider_id' ";
                    $updated_rows = $db->update($query);
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Data updated Successfully.  </span>";
                } else {
                    echo "<span class='error'>Data Not updated !</span>";
                }
            }
        }
        ?>
        <div class="block">   
            <?php
            $query = "SELECT * FROM tbl_slider WHERE id = '$slider_id' order by id desc";
            $post_value = $db->select($query);
            $post_result = $post_value->fetch_assoc();
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Slider Title</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $post_result['title'];  ?>" name="title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $post_result['image']; ?>" height="100px" width="200px">
                            <br/>
                            <input type="file" name="image"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update Slider" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>


