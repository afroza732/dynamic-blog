<?php include './config/config.php'; ?>
<?php include './lib/Database.php'; ?>
<?php include './helpers/Format.php'; ?>

<?php
$db = new Database();
$fm = new Format();
?>
<?php
if (isset($_GET['page_id'])) {
    $title_id = $_GET['page_id'];
    $query = "SELECT * FROM   tbl_pages WHERE id = '$title_id'";
    $page_title = $db->select($query);
    if ($page_title) {
        while ($result = $page_title->fetch_assoc()) {
            ?> 
            <title><?php echo $result['name']; ?> - <?php echo TITLE; ?></title>   
            <?php
        }
    }
} elseif (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $query = "SELECT * FROM   tbl_post WHERE post_id = '$post_id'";
    $post = $db->select($query);
    if ($post) {
        while ($result = $post->fetch_assoc()) {
            ?> 
            <title><?php echo $result['post_title']; ?> - <?php echo TITLE; ?></title>   
            <?php
        }
    }
} else {
    ?>
    <title><?php echo $fm->title(); ?> - <?php echo TITLE; ?></title> 

<?php } ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'Scripts/meta.php';?>
        <?php include 'Scripts/css.php';?>
        <?php include 'Scripts/js.php';?>
       
    </head>

    <body>
        <div class="headersection templete clear">
            <a href="index.php">
                <div class="logo">

                    <?php
                    $query = "SELECT * FROM tbl_logo WHERE id ='1'";
                    $logo = $db->select($query);
                    if ($logo) {
                        while ($result = $logo->fetch_assoc()) {
                            ?>
                            <img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
                            <h2><?php echo $result['title']; ?></h2>
                            <p><?php echo $result['slogan']; ?></p>

                            <?php
                        }
                    }
                    ?>
                </div>
            </a>
            <div class="social clear">
                <div class="icon clear">
                    <?php
                    $query = "SELECT * FROM  tbl_social WHERE id ='1'";
                    $social = $db->select($query);
                    if ($social) {
                        while ($result = $social->fetch_assoc()) {
                            ?>
                            <a href="<?php echo $result['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo $result['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo $result['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="<?php echo $result['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="searchbtn clear">
                    <form action="search.php" method="get">
                        <input type="text" name="search" placeholder="Search keyword..." class="middle"/>
                        <input type="submit" name="submit" value="Search"/>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $path = $_SERVER['SCRIPT_FILENAME'];
        $page_highlight = basename($path, '.php');
        ?>
        <div class="navsection templete">
            <ul>
                <li><a <?php
                    if ($page_highlight == 'index') {
                        echo "id ='active'";
                    }
                    ?>  href="index.php">Home</a></li>
                    <?php
                    $query = "SELECT * FROM   tbl_pages";
                    $page = $db->select($query);
                    if ($page) {
                        while ($result = $page->fetch_assoc()) {
                            ?>
                        <li><a
                            <?php
                            if (isset($_GET['page_id']) && $_GET['page_id'] == $result['id'])
                                echo "id ='active'";
                            ?>
                                href="pages.php?page_id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?>
                            </a> 
                        </li>
                        <?php
                    }
                }
                ?>
                <li><a <?php
                    if ($page_highlight == 'contact') {
                        echo "id ='active'";
                    }
                    ?>  href="contact.php">Contact</a></li>
            </ul>
        </div>
