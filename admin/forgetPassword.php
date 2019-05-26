<?php
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>

<?php
$db = new Database();
$fm = new Format();
?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Recovery Password</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
            <?php
            if (isset($_POST['btn'])) {
                 $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo"<span style: color:green; font-size:20px;>Invalid Email Address !</span>";  
                } else {

                    $query = "SELECT * FROM tbl_users WHERE email = '$email' limit 1";
                    $checkMail = $db->select($query);

                    if ($checkMail != false) {
                        while ($value = $checkMail->fetch_assoc()) {
                            $user_id = $value['user_id'];
                            $user_name = $value['user_name'];
                        }
                            $text = substr($email, 0, 3);
                            $rand = rand(10000, 99999);
                            $newPass = "$text$rand";
                            $password = md5($newPass);

                            $query = "UPDATE tbl_users SET email ='$email' WHERE user_id = '$user_id' ";
                            $update_row = $db->update($query);

                            $to = '$email';
                            $from = 'Liveproject@gmail.com';
                            $headers = 'From: $from\n';
                            $headers .= 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $subject = "Your Password";
                            $message = "Your user name is .'$user_name' . Your password is .'$newPass' . Please visit our website .";

                            $sendMail = mail($to, $subject, $message, $headers);

                            if ($sendMail) {
                                echo"<span style: colorr:green; font-size:20px;>Please Check your Email</span>";
                            }
                    } else {
                        echo"<span style: colorr:green; font-size:20px;>Email Not Exist !</span>";
                    }
                }
            }
            ?>

            
            <form action="" method="post">
                <h1>Recovery Password</h1>
                <div>
                    <input type="text" placeholder="Please Valid Password"  name="email"/>
                </div>
                <div>
                    <input type="submit" name="btn" value="Send Mail" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login.php">Login !</a>
            </div>
        </section>
    </div>
</body>
</html>