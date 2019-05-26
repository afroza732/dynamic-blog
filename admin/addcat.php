<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock"> 

            <?php
            if (isset($_POST['submit'])) {
                $category_name = $_POST['category_name'];
                $category_name = mysqli_real_escape_string($db->link, $category_name);
                if (empty($category_name)) {
                    echo 'Category name must not be empty!';
                } else {
                    $query = "INSERT INTO tbl_category(category_name)VALUES('$category_name')";
                    $category_insert = $db->insert($query);
                    if ($category_insert) {
                        echo 'Category inserted succesfully';
                    } else {
                        echo 'Category inserted not  succesfully';
                    }
                }
            }
            ?>
            <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="category_name" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr> 
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
