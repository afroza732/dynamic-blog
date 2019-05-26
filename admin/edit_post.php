<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>

<?php
$post_id = mysqli_real_escape_string($db->link, $_GET['post_id']);
if (!isset($post_id) && $post_id == NULL) {
    header('Location: postlist.php');
} else {
    $post_id = $post_id;
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php
        if (isset($_POST['submit'])) {
            $post_title = mysqli_real_escape_string($db->link, $_POST['post_title']);
            $category_id = mysqli_real_escape_string($db->link, $_POST['category_id']);
            $post_body = mysqli_real_escape_string($db->link, $_POST['post_body']);
            $post_author = mysqli_real_escape_string($db->link, $_POST['post_author']);
            $post_tags = mysqli_real_escape_string($db->link, $_POST['post_tags']);
            $tags_description = mysqli_real_escape_string($db->link, $_POST['tags_description']);
            $user_id = mysqli_real_escape_string($db->link, $_POST['user_id']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['post_image']['name'];
            $file_size = $_FILES['post_image']['size'];
            $file_temp = $_FILES['post_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $folder = "images/" . $unique_image;


            if ($post_title == "" || $category_id == "" || $post_body == "" || $post_author == "" || $post_tags == "" || $tags_description == "") {
                echo 'Field must not be empty !';
            }
            if (!empty($file_name)) {

                if ($file_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($file_temp, $folder);
                    $query = "UPDATE tbl_post SET "
                            . "post_title ='$post_title',"
                            . "category_id='$category_id',"
                            . "post_body='$post_body',"
                            . "post_image='$folder',"
                            . "post_author='$post_author',"
                            . "post_tags='$post_tags' ,"
                            . "tags_description='$tags_description' ,"
                            . "user_id='$user_id'"
                            . "WHERE post_id = '$post_id' ";
                    $updated_rows = $db->update($query);
                    if ($updated_rows) {
                        echo "<span class='success'>Data updated Successfully.  </span>";
                    } else {
                        echo "<span class='error'>Data Not updated !</span>";
                    }
                }
            } else {
                $query = "UPDATE tbl_post SET "
                        . "post_title ='$post_title',"
                        . "category_id='$category_id',"
                        . "post_body='$post_body',"
                        . "post_author='$post_author',"
                        . "post_tags='$post_tags' ,"
                        . "tags_description='$tags_description',"
                        . "user_id='$user_id'"
                        . "WHERE post_id = '$post_id' ";
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
            $query = "SELECT * FROM tbl_post WHERE post_id = '$post_id' order by post_id desc";
            $post_value = $db->select($query);
            $post_result = $post_value->fetch_assoc();
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $post_result['post_title']; ?>" name="post_title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category_id" value="<?php echo $post_result['category_name']; ?>">
                                <option>---Select Category---</option>
                                <?php
                                $query = "SELECT * FROM tbl_category";
                                $post = $db->select($query);
                                if ($post) {
                                    while ($result = $post->fetch_assoc()) {
                                        ?>
                                        <option 

                                            <?php if ($post_result['category_id'] == $result['category_id']) { ?>
                                                selected="selected"
                                            <?php } ?>

                                            value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="post_body"><?php echo $post_result['post_body']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $post_result['post_image']; ?>" height="100px" width="200px">
                            <br/>
                            <input type="file" name="post_image"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="post_author"  value="<?php echo $post_result['post_author']; ?>"  class="medium" />
                            <input type="hidden" name="user_id"  value="<?php echo $user_id; ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="post_tags" value="<?php echo $post_result['post_tags']; ?>" placeholder="Enter Tags Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags Description</label>
                        </td>
                        <td>
                            <input type="text" name="tags_description" value="<?php echo $post_result['tags_description']; ?>" placeholder="Enter Tags Title..." class="medium" />
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
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>


