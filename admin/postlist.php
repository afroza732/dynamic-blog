<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php
        if (isset($_GET['delete'])) {
            $post_id = mysqli_real_escape_string($db->link, $_GET['delete']);
            $post_id = $_GET['delete'];
            $sql = "SELECT * FROM tbl_post WHERE post_id = '$post_id'";
            $post_select = $db->select($sql);
            if ($post_select) {
                while ($result = $post_select->fetch_assoc()) {
                    $del_link = $result['post_image'];
                    unlink($del_link);
                }
            }
            $query = "DELETE FROM tbl_post WHERE post_id = '$post_id'";
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
                        <th width='5%'>No.</th>
                        <th width='10%'>Post Title</th>
                        <th width='5%'>Category</th>
                        <th width='20%'>Body</th>
                        <th width='10%'>Image</th>
                        <th width='5%'>Author</th>
                        <th width='10%'>Tags</th>
                        <th width='10%'>Description</th>
                        <th width='10%'>Date</th>
                        <th width='15%'>Action</th>
                    </tr>
                </thead>
                <tbody> <?php
        $query = "SELECT tbl_post.*,tbl_category.category_name FROM tbl_post INNER JOIN tbl_category ON tbl_post.category_id=tbl_category.category_id ORDER BY tbl_post.post_title DESC";
        $post_result = $db->select($query);
        if ($post_result) {
            $i = 0;
            while ($result = $post_result->fetch_assoc()) {
                $i++;
                ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['post_title']; ?></td>
                                <td><?php echo $result['category_name']; ?></td>
                                <td><?php echo $fm->textHandle($result['post_body'], 50); ?></td>
                                <td><img src="<?php echo $result['post_image']; ?>" height="30px" width="40px"></td>
                                <td><?php echo $result['post_author']; ?></td>
                                <td><?php echo $result['post_tags']; ?></td>
                                <td><?php echo $result['tags_description']; ?></td>
                                <td><?php echo $fm->formateDate($result['date']); ?></td>
                                <td>
                                    <a href="view_post.php?post_id=<?php echo $result['post_id']; ?>">View</a> 
                                    <?php if ($user_id == $result['user_id'] || $role == '0') { ?>
                                        || <a href="edit_post.php?post_id=<?php echo $result['post_id']; ?>">Edit</a> || 
                                        <a href="?delete=<?php echo $result['post_id']; ?>" onclick="return confirm('Are you sure Delete this !');">Delete</a>  
                                       
                                     <?php   } ?>

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
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>
    <?php include './inc/footer.php'; ?>
