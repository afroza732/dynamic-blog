<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Theme</h2>
        <div class="block copyblock"> 

            <?php
          if (isset($_POST['submit'])) {
               $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
                   $query = "UPDATE  tbl_theme SET theme ='$theme' WHERE id = '1' ";
                   $theme_update = $db->update($query);
                   if ($theme_update) {
                       echo"<span style:color:green; font-size:20px;>Theme updated succesfully</span>";  
                     
                    } else {
                       echo"<span style:color:green; font-size:20px;>Theme not  updated !!</span>";  
                   }
               }
?>
            <?php
           $query = "SELECT * FROM tbl_theme WHERE id = '1'";
            $value = $db->select($query);
            $result = $value->fetch_assoc();
            ?>
            <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="radio" <?php if($result['theme'] == 'defult'){echo 'checked';}?> name="theme" value="defult" />Defult
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="theme" value="green" <?php if($result['theme'] == 'green'){echo 'checked';}?> />Green
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="theme" value="red" <?php if($result['theme'] == 'red'){echo 'checked';}?>/>Red
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Change" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>



