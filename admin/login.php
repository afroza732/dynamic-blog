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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
            <?php
            if (isset($_POST['btn'])) {
                $user_name = $fm->validation($_POST['user_name']);
                $password = $fm->validation(md5($_POST['password']));
                $user_name = mysqli_real_escape_string($db->link, $user_name);
                $password = mysqli_real_escape_string($db->link, $password);
                $query = "SELECT * FROM  tbl_users WHERE user_name ='$user_name' AND password = '$password'";
                $result = $db->select($query);
                if ($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set("login", true);
                    $_SESSION['user_name'] = $value['user_name'];
                    $_SESSION['role'] = $value['role'];
                    $_SESSION['user_id'] = $value['user_id'];
                    header('Location: index.php');
                } else {
                    echo 'Username or Password not match!!!';
                }
            }
            ?>


            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <div>
                    <input type="text" placeholder="Username"  name="user_name"/>
                </div>
                <div>
                    <input type="password" placeholder="Password"  name="password"/>
                </div>
                <div>
                    <input type="submit" name="btn" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="forgetPassword.php">Forgot Password!</a>
            </div><!-- button -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>