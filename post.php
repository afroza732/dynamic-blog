<?php include './inc/header.php'; ?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
header('Location: 404.php');
} else {
$id = $_GET['id'];
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
       
        <?php
        
        $query = "SELECT * FROM tbl_post where post_id = '$id'";
        $post = $db->select($query);
        if($post){
        while ($result = $post->fetch_assoc()) {  
        ?>
       
        <div class="about">
            <h2><?php echo $result['post_title']; ?></h2>
            <h4><?php echo $fm->formateDate($result['date']); ?>, By <a href="#"><?php echo $result['post_author']; ?></a></h4>
            <img src="admin/<?php echo $result['post_image']; ?>"/>
             <p><?php echo $result['post_body']; ?></p>
            
             
             
            <div class="relatedpost clear">
                <h2>Related articles</h2>
                <?php
                $cat_id = $result['category_id'];
                $query_related = "SELECT * FROM tbl_post where category_id = '$cat_id' order by rand() limit 6";
                $related_post = $db->select($query_related);
                if($related_post){
                while ($related_result = $related_post->fetch_assoc()) {
                ?>
                
                <a href="post.php?id=<?php echo $related_result['post_id']; ?>">
                    <img src="admin/<?php echo $related_result['post_image']; ?>" alt="post image"/>
                </a>
                
               <?php } } else{ echo 'No related post Available !! ';}?>   
            </div>
        <?php }} else{header('Location: 404.php ');} ?>  
        </div>
       
    </div>

    <?php include './inc/sidebar.php'; ?>
    <?php include './inc/footer.php'; ?>
        