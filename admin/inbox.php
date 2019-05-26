<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <?php
        if (isset($_GET['seen_id'])) {
            $id = mysqli_real_escape_string($db->link, $_GET['seen_id']);
            $query = "UPDATE tbl_contact SET status ='1' WHERE id = '$id' ";
            $status_update = $db->update($query);
            if ($status_update) {
                echo 'Meassage Seen succesfully';
            } else {
                echo 'Meassage  not Seen !';
            }
        } else {
            
        }
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  tbl_contact WHERE status ='0' order by  id desc ";
                    $inbox_result = $db->select($query);
                    if ($inbox_result) {
                        $i = 0;
                        while ($result = $inbox_result->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $fm->textHandle($result['body'], 30); ?></td>
                                <td><?php echo $fm->validation($result['date']); ?></td>
                                <td>
                                    <a href="view.php?view_id=<?php echo $result['id']; ?>">View</a> || 
                                    <a href="reply.php?reply_id=<?php echo $result['id']; ?>">Replay</a> || 
                                    <a onclick="return confirm('Are you sure move the seen message!');" href="?seen_id=<?php echo $result['id']; ?>">Seen</a>
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
    <div class="box round first grid">
        <h2>Seen Message</h2>
        <?php
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query = "DELETE FROM tbl_contact WHERE id = '$id'";
            $category_delete = $db->delete($query);
            if ($category_delete) {
                echo 'Message deleted successfully';
            } else {
                echo 'Message not  deleted successfully';
            }
        }
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  tbl_contact WHERE status ='1' order by  id desc ";
                    $inbox_result = $db->select($query);
                    if ($inbox_result) {
                        $i = 0;
                        while ($result = $inbox_result->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                <td><?php echo $result['email'] ?></td>
                                <td><?php echo $fm->textHandle($result['body'], 30); ?></td>
                                <td><?php echo $fm->validation($result['date']); ?></td>
                                <td><a  onclick="return confirm('Are you sure delete the  message!');" href="?delete=<?php echo $result['id']; ?>">Delete</a></td>
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