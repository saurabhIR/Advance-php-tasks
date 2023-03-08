<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innoraft Solutions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav-bar">
        <div class="content">
            <h4><a href="#">HOME</a></h4>
            <p>/</p>
            <p>Our Services</p>
        </div>
    </nav>
    <div class="container">
    <?php
        include 'logic.php';
        $client = new apicaller();
        $arr_size = $client->arrLength();
        for ($num = 12;$num < $arr_size;$num++) {
            $title = $client->title($num);
            $img = $client->image($num);
            $icons = $client->icons($num);
            $list = $client->list($num);
            if ($num % 2 == 0) {
            ?>
            <!-- Shows the image on left side and the data on right side-->
            <div class="section">
                <div class="section-left">
                    <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$img ?>" alt="">
                </div>
                <div class="section-right">
                    <div class="title">
                        <?php echo $title; ?>
                    </div>
                    <div class="icon section">
                        <?php foreach ($icons as $icon) {?>
                            <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$icon ?>" alt="">
                        <?php }?>    
                    </div>
                    <div class="list">
                        <?php echo $list; ?>
                    </div>
                    <button class="button"> Explore Now </button>
                </div>
            </div>
        <?php
            } else {
            ?>
        <!-- Shows the data on left side and image on right side-->    
        <div class="section">
            <div class="section-left">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="icon section">
                        <?php foreach ($icons as $icon) {?>
                            <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$icon ?>" alt="">
                        <?php }?>    
                    </div>
                <div class="list">
                    <?php echo $list; ?>
                </div>
                <button class="button"> Explore Now </button>
            </div>
            <div class="section-right">
                <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$img ?>" alt="">
            </div>
        </div>
            <?php
            }
        }
    ?>
    </div>
</body>
</html>