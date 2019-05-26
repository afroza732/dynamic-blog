<?php
include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php
$db = new Database();

?>
<?php
if (isset($_GET['delete'])) {
    $page_id = mysqli_real_escape_string($db->link, $_GET['delete']);
    $query = "DELETE FROM tbl_pages WHERE id = '$page_id'";
    $page_delete = $db->delete($query);
    if ($page_delete) {
        echo "<script>alert('Data deleted successfully');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Data not deleted !');</script>";
        echo "<script>window.location = 'index.php';</script>";
    }
}
?>