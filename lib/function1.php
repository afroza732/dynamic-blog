<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
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

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['post_image']['name'];
            $file_size = $_FILES['post_image']['size'];
            $file_temp = $_FILES['post_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $post_image = "images/" . $unique_image;


            if ($post_title == "" || $category_id == "" || $post_body == "" || $post_image="" || $file_name == "" || $post_author == "" || $post_tags == "") {
                echo 'Field must not be empty !';
            } elseif ($file_size > 1048567) {
                echo "<span class='error'>Image Size should be less then 1MB! </span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
            } else {
                move_uploaded_file($file_temp, $post_image);
                $query = "INSERT INTO  tbl_post(category_id,post_title,post_body,post_image,post_author,post_tags) VALUES('$category_id','$post_title','$post_body','$post_image','$post_author','$post_tags')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                    echo "<span class='success'>Data Inserted Successfully.  </span>";
                } else {
                    echo "<span class='error'>Data Not Inserted !</span>";
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
                            <input type="text" name="post_title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                <option>---Select Category---</option>
                                <?php
                                $query = "SELECT * FROM tbl_category";
                                $post = $db->select($query);
                                if ($post) {
                                    while ($result = $post->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></option>
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
                            <textarea class="tinymce" name="post_body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="post_image"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="post_author"  placeholder="Enter Author Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="post_tags"  placeholder="Enter Tags Title..." class="medium" />
                        </td>
                    </tr>
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

