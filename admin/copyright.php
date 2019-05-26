<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<?php
$query = "SELECT * FROM  tbl_copyright WHERE id ='1'";
$copy = $db->select($query);
if ($copy) {
while ($result = $copy->fetch_assoc()) {

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
         <?php
            if (isset($_POST['submit'])) {
            $copy = mysqli_real_escape_string($db->link,  $fm->validation($_POST['copy']));
            
             if ($copy == "") {
                echo 'Field must not be empty !';
            }else{
                
                $query = "UPDATE tbl_copyright SET copy ='$copy' WHERE id = '1' ";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Data updated Successfully.  </span>";
                } else {
                    echo "<span class='error'>Data Not updated !</span>";
                }
            }
            }
        ?>
        <div class="block copyblock"> 
            <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $result['copy']; ?>" name="copy" class="large" />
                        </td>
                    </tr>

                    <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php } }?>
<?php include './inc/footer.php'; ?>
