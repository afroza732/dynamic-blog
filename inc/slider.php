
<div class="slidersection templete clear">
    <div id="slider">
        <?php
        $query = "SELECT * FROM tbl_slider order by id limit 5";
        $slider_result = $db->select($query);
        if ($slider_result) {
            $i = 0;
            while ($result = $slider_result->fetch_assoc()) {
                ?>
                <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="nature 1" title="<?php echo $result['title']; ?>"/></a>
            <?php }
        }
        ?>    
    </div>

</div>