<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
         <?php
        if(isset($_GET['delete'])){
           $user_id = mysqli_real_escape_string($db->link, $_GET['delete']);
           $query = "DELETE FROM tbl_users WHERE user_id = '$user_id'";
           $user_delete = $db->delete($query);
           if($user_delete){
               echo "<script>alert('Post deleted successfully');</script>"; 
           }else{
             echo 'Post not  deleted successfully';    
           }
        }
        
        ?>
        
        <div class="block">  
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Password</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> <?php
                    $query = "SELECT * FROM tbl_users";
                    $user_result = $db->select($query);
                    if ($user_result) {
                        $i = 0;
                        while ($result = $user_result->fetch_assoc()) {
                            $i++;
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['name']; ?></td>
                                <td><?php echo $result['user_name']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['user_description']; ?></td>
                                <td><?php echo $result['password']; ?></td>
                                <td>
                                    <?php 
                                    if($result['role']=='0'){
                                        
                                        echo 'Admin';
                                    }
                                    elseif($result['role']=='1'){
                                        
                                        echo 'Author';
                                    }
                                    elseif($result['role']=='2'){
                                        
                                        echo 'Editor';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="view_role.php?role_id=<?php echo $result['user_id'];?>">View</a> || 
                                    <a href="?delete=<?php echo $result['user_id'];?>" onclick="return confirm('Are you sure Delete this !');">Delete</a>
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
