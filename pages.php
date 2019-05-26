<?php include './inc/header.php'; ?>
<?php
if (!isset($_GET['page_id']) && $_GET['page_id'] == NULL) {
    header('Location: 404.php');
} else {
    $page_id = $_GET['page_id'];
}
?>
<div class="contentsection contemplete clear">
    <?php
    $query = "SELECT * FROM   tbl_pages WHERE id ='$page_id'";
    $page = $db->select($query);
    if ($page) {
        while ($result = $page->fetch_assoc()) {
            ?>
            <div class="maincontent clear">
                <div class="about">
                    <h2><?php echo $result['name']; ?></h2>
                    <p><?php echo $result['body']; ?></p>
                </div>

            </div>
        <?php
        }
    } else {
        header('Location: 404.php');
    }
    ?>

<?php include './inc/sidebar.php'; ?>
<?php include './inc/footer.php'; ?>
