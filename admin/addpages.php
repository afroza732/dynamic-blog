<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>
        <?php
        if (isset($_POST['submit'])) {
            $name= mysqli_real_escape_string($db->link, $_POST['name']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            
            if ($name == "" || $body == "") {
                echo 'Field must not be empty !';
            } else {
                $query = "INSERT INTO   tbl_pages(name,body) VALUES('$name','$body')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                    echo "<span class='success'>Page Created Successfully.  </span>";
                } else {
                    echo "<span class='error'>Page Not Created !</span>";
                }
            }
        }
        ?>
        <div class="block">               
            <form action="" method="post">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Name ..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
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



