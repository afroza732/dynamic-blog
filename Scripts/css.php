<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<?php
$query = "SELECT * FROM tbl_theme WHERE id = '1'";
$value = $db->select($query);
$result = $value->fetch_assoc();
if ($result['theme'] == 'defult') {
    ?>
    <link rel="stylesheet" href="theme/default.php">  
<?php } elseif ($result['theme'] == 'green') { ?>
    <link rel="stylesheet" href="theme/green.php">  
<?php } elseif ($result['theme'] == 'red') { ?>
    <link rel="stylesheet" href="theme/red.php">  
<?php } ?>

