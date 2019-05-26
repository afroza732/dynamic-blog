<?php include './inc/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($db->link, $fm->validation($_POST['firstname']));
    $lastname = mysqli_real_escape_string($db->link, $fm->validation($_POST['lastname']));
    $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
    $body = mysqli_real_escape_string($db->link, $fm->validation($_POST['body']));

    $error = "";
    if (empty($firstname)) {
        $error = 'First Name must be required !';
    } elseif (empty($lastname)) {
        $error = 'Last Name must be required !';
    } elseif (empty($email)) {
        $error = 'Email must be required !';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email Not Valid !';
    } elseif (empty($body)) {
        $error = 'Message must be required !';
    } else {
        $query = "INSERT INTO  tbl_contact(firstname,lastname,email,body) VALUES('$firstname','$lastname','$email','$body')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            $message = "Message sent  Successfully";
        } else {
            $message = "Messag Not sent !";
        }
    }
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <h2 >Contact us</h2>
            <?php
            if (isset($error)) {
                echo "<span style='color:teal; font-size:15px; text-alin:center;'>$error</span>";
            }
            if (isset($message)) {
                echo "<span style='color:teal; font-size: 20px;'>$message</span>";
            }
            ?>

            <form action="" method="post">
                <table>
                    <tr>
                        <td>Your First Name:</td>
                        <td>
                            <input type="text" name="firstname" placeholder="Enter first name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Last Name:</td>
                        <td>
                            <input type="text" name="lastname" placeholder="Enter Last name"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Your Email Address:</td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Email Address"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Message:</td>
                        <td>
                            <textarea name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Send"/>
                        </td>
                    </tr>
                </table>
                </form>				
                    </div>

                    </div>
                    <?php include './inc/sidebar.php'; ?>
                    <?php include './inc/footer.php'; ?>