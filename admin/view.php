<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
  $id = mysqli_real_escape_string($db->link, $_GET['view_id']);
if (!isset($id) && $id == NULL) {
    header('Location: index.php');
} else {
    $id = $id;
    
}

?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>View Message</h2>
        <?php
        if (isset($_POST['submit'])) {
         echo "<script>window.location = 'inbox.php';</script>"; 
        }
        ?>
        <div class="block">               
            <form action="" method="post">
                <?php
                $query = "SELECT * FROM  tbl_contact WHERE id = '$id' ";
                $view_result = $db->select($query);
                if ($view_result) {
                    $i = 0;
                    while ($result = $view_result->fetch_assoc()) {
                        $i++;
                        ?>
                        <table class="form">
                            <tr>
                                <td>Your First Name:</td>
                                <td>
                                    <input type="text" class="medium" value="<?php echo $result['firstname'].' '.$result['lastname'] ;?>"/>
                                </td>
                            </tr>

                            <tr>
                                <td>Your Email Address:</td>
                                <td>
                                    <input type="email"  class="medium" value="<?php echo $result['email'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Your Message:</td>
                                <td>
                                    <textarea class="tinymce"><?php echo $result['body'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td>
                                    <input type="text"  class="medium" value="<?php echo $result['date'];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit"  value="ok"/>
                                </td>
                            </tr>
                        </table>
                    <?php }
                } ?>
            </form>				
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>

