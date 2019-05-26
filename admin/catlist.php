<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        
        <?php
        if(isset($_GET['delete'])){
         $id = mysqli_real_escape_string($db->link, $_GET['delete']);
           $query = "DELETE FROM tbl_category WHERE category_id = '$id'";
           $category_delete = $db->delete($query);
           if($category_delete){
               echo 'Category deleted successfully'; 
           }else{
             echo 'Category not  deleted successfully';    
           }
        }
        
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbl_category order by  category_id desc ";
                    $category_result = $db->select($query);
                    if ($category_result) {
                        $i = 0;
                        while ($result = $category_result->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['category_name'] ?></td>
                                <td>
                                    <a href="edit.php?category_id=<?php echo $result['category_id'] ?>">Edit</a> || 
                                    <a onclick="return confirm('Are you sure Delete !');" href="?delete=<?php echo $result['category_id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } ?>
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
           