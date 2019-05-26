<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
$id = mysqli_real_escape_string($db->link, $_GET['reply_id']);
if (!isset($id) && $id == NULL) {
    header('Location: index.php');
} else {
    $id =$id;
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>View Message</h2>
        <?php
        if (isset($_POST['submit'])) {
            $toEmail = mysqli_real_escape_string($db->link, $fm->validation($_POST['toEmail']));
            $fromEmail = mysqli_real_escape_string($db->link, $fm->validation($_POST['fromEmail']));
            $subject = mysqli_real_escape_string($db->link, $fm->validation($_POST['message']));
            $message = mysqli_real_escape_string($db->link, $fm->validation($_POST['body']));
            $sendMail = mail($toEmail, $subject, $message,$fromEmail);
            if($sendMail){
                 echo "<span class='success'>Email Sent Successfully</span>";
            }else {
                    echo "<span class='error'>Email Not Sent !</span>";
                }
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
                                <td>To :</td>
                                <td>
                                    <input type="text" readonly="" class="medium" name="toEmail" value="<?php echo $result['email']; ?>"/>
                                </td>
                            </tr>

                            <tr>
                                <td>From :</td>
                                <td>
                                    <input type="text" class="medium" name="fromEmail"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Subject :</td>
                                <td>
                                    <input type="text" class="medium" name="subject"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Message:</td>
                                <td>
                                    <textarea class="tinymce" name="message"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit"  value="send"/>
                                </td>
                            </tr>
                        </table>
                    <?php }
                }
                ?>
            </form>				
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>

