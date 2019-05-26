<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
$page_id = mysqli_real_escape_string($db->link, $_GET['page_id']);
if (!isset($page_id) && $page_id == NULL) {
    header('Location: index.php');
} else {
    $page_id = $page_id;
}
?>

<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Edit Page</h2>
        <?php
        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);

            if ($name == "" || $body == "") {
                echo 'Field must not be empty !';
            } else {
                $query = "UPDATE tbl_pages SET name ='$name',body='$body' WHERE id = '$page_id' ";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Page Updated Successfully.  </span>";
                } else {
                    echo "<span class='error'>Page Not Updated !</span>";
                }
            }
        }
        ?>
        <div class="block">    
            <?php
            $query = "SELECT * FROM   tbl_pages WHERE id ='$page_id'";
            $page = $db->select($query);
            if ($page) {
                while ($result = $page->fetch_assoc()) {
                    ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Body</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name="body"><?php echo $result['body']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                    <a  href="delPage.php?delete=<?php echo $result['id'] ?>" onclick="return confirm('Are you sure Delete the page! !');">Delete</a>
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





