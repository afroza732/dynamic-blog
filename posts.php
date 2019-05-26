<?php include './inc/header.php'; ?>
<?php include './inc/slider.php'; ?>

<?php
if (!isset($_GET['category_id']) || $_GET['category_id'] == NULL) {
    header('Location: 404.php');
} else {
    $category_id = $_GET['category_id'];
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $query = "SELECT * FROM tbl_post where category_id = '$category_id'";
        $category = $db->select($query);
        if ($category) {
            while ($category_result = $category->fetch_assoc()) {
                ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $category_result['post_id']; ?>"><?php echo $category_result['post_title']; ?></a></h2>
                    <h4><?php echo $fm->formateDate($category_result['date']); ?>, By <a href="#"><?php echo $category_result['post_author']; ?></a></h4>
                    <a href="post.php?id=<?php echo $category_result['post_id']; ?>"><img src="admin/<?php echo $category_result['post_image']; ?>" alt="post image"/></a>
                    <p><?php echo $fm->textHandle($category_result['post_body']); ?></p>
                    <div class="readmore clear">
                        <a href="post.php?id=<?php echo $category_result['post_id']; ?>">Read More</a>
                    </div>
                </div>
            <?php }
        } else {
            echo 'No posts available !';
        } ?><!--while loop end===-->

    </div>

<?php include './inc/sidebar.php'; ?>
<?php include './inc/footer.php'; ?>



