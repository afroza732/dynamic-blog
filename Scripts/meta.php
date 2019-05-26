<meta name="language" content="English">
         <?php
        if (isset($_GET['id'])) {
            $description_id = $_GET['id'];
            $query = "SELECT * FROM   tbl_post WHERE post_id = '$description_id'";
            $description = $db->select($query);
            if ($description) {
                while ($result = $description->fetch_assoc()) {
                    ?> 
                    <meta name="description" content="<?php echo $result['tags_description']; ?>">  
                    <?php } } } else { ?> 
                <meta name="description" content="<?php echo DESCRIPTION;?>">      
         <?php   }   ?>       
        <?php
        if (isset($_GET['id'])) {
            $keyword_id = $_GET['id'];
            $query = "SELECT * FROM   tbl_post WHERE post_id = '$keyword_id'";
            $keywords = $db->select($query);
            if ($keywords) {
                while ($result = $keywords->fetch_assoc()) {
                    ?> 
                    <meta name="keywords" content="<?php echo $result['post_tags']; ?>">  
                    <?php } } } else { ?> 
                <meta name="keywords" content="<?php echo KEYWORDS;?>">      
         <?php   }   ?>     
                     
        <meta name="author" content="Afroza">

