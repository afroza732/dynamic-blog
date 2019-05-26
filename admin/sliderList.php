<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <?php
        if (isset($_GET['delete'])) {
            $id = mysqli_real_escape_string($db->link, $_GET['delete']);
            $sql = "SELECT * FROM tbl_slider WHERE id = '$id'";
            $post_select = $db->select($sql);
            if ($post_select) {
                while ($result = $post_select->fetch_assoc()) {
                    $del_link = $result['image'];
                    unlink($del_link);
                }
            }
            $query = "DELETE FROM tbl_slider WHERE id = '$id'";
            $post_delete = $db->delete($query);
            if ($post_delete) {
                echo "<script>alert('Post deleted successfully');</script>";
            } else {
                echo 'Post not  deleted successfully';
            }
        }
        ?>

        <div class="block">  
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Post Title</th>
                        <th>Slider Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> <?php
                    $query = "SELECT * FROM tbl_slider ";
                    $slider_result = $db->select($query);
                    if ($slider_result) {
                        $i = 0;
                        while ($result = $slider_result->fetch_assoc()) {
                            $i++;
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                 <td><?php echo $result['title']; ?></td>
                                <td><img src="<?php echo $result['image']; ?>" height="30px" width="40px"></td>
                                <td>
                                    <?php if ($role == '0') { ?>
                                        <a href="editSlider.php?slider_id=<?php echo $result['id']; ?>">Edit</a> || 
                                        <a href="?delete=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure Delete this !');">Delete</a>  

                                    <?php } ?>

                                </td>
                            </tr>

                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>
