<?php include './inc/header.php'; ?>

<?php
if (!isset($_GET['search']) || $_GET['search'] == NULL) {
    header('Location: 404.php');
} else {
    $search = $_GET['search'];
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $query = "SELECT * FROM tbl_post WHERE post_title LIKE '%$search%' OR post_body LIKE '%$search%' ";
        $category = $db->select($query);
        if ($category) {
            while ($category_result = $category->fetch_assoc()) {
                ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $category_result['post_id']; ?>"><?php echo $category_result['post_title']; ?></a></h2>
                    <h4><?php echo $fm->formateDate($category_result['date']); ?>, By <a href="#"><?php echo $category_result['post_author']; ?></a></h4>
                    <a href="post.php?id=<?php echo $category_result['post_id']; ?>"><img src="admin/images/<?php echo $category_result['post_image']; ?>" alt="post image"/></a>
                    <p><?php echo $fm->textHandle($category_result['post_body']); ?></p>
                    <div class="readmore clear">
                        <a href="post.php?id=<?php echo $category_result['post_id']; ?>">Read More</a>
                    </div>
                </div>
            <?php }
        } else { ?>

        <p>Your search query not found !!!</p>
        <?php } ?><!--while loop end===-->

    </div>

    <?php include './inc/sidebar.php'; ?>
    <?php include './inc/footer.php'; ?>



