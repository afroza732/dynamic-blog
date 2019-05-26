<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <?php
        $query = "SELECT * FROM tbl_category";
        $category = $db->select($query);
        if ($category) {
            while ($result = $category->fetch_assoc()) {
                ?>
                <ul>
                    <li><a href="posts.php?category_id=<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></a></li>
                <?php }
            } else {
                ?>
                <li>No category</li>
<?php } ?>
        </ul>
    </div>

    <div class="samesidebar clear">
        <h2>Latest articles</h2>
        <?php
        $query = "SELECT * FROM tbl_post limit 4";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {
                ?>
                <div class="popular clear">
                    <h3><a href="post.php?id=<?php echo $result['post_id']; ?>"><?php echo $result['post_title']; ?></a></h3>
                   <a href="post.php?id=<?php echo $result['post_id']; ?>"><img src="admin/<?php echo $result['post_image']; ?>" alt="post image"/></a>
                    <p><?php echo $fm->textHandle($result['post_body'],100); ?></p>
                </div>
    <?php }
} ?>
    </div>

</div>