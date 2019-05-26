<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
$page_id = mysqli_real_escape_string($db->link, $_GET['category_id']);
if(!isset($page_id) && $page_id == NULL ){
    header('Location: catlist.php') ;
}else{
  $category_id =  $page_id;
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Update Category</h2>
        <div class="block copyblock"> 

            <?php
           if (isset($_POST['update_btn'])) {
               $category_name = $_POST['category_name'];
               $category_name = mysqli_real_escape_string($db->link, $category_name);
                if (empty($category_name)) {
                    echo 'Category name must not be empty!';
                } else {
                   $query = "UPDATE tbl_category SET category_name ='$category_name' WHERE category_id = '$category_id' ";
                   $category_update = $db->update($query);
                   if ($category_update) {
                        echo 'Category updated succesfully';
                    } else {
                        echo 'Category  not updated succesfully';
                    }
                }
           }
            ?>
            <?php
            $query = "SELECT * FROM tbl_category WHERE category_id = '$category_id' order by category_id desc";
            $category_value = $db->select($query);
            $category_result = $category_value->fetch_assoc();
            ?>
            <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="category_name" value="<?php echo $category_result['category_name'] ;?>" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <input type="submit" name="update_btn" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>



