<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
</head>
<body>
    <a href="<?php echo URLROOT . 'pages/about'?>">Go To About</a>

    <h1><?php echo $data['title'];?></h1>

    <ul>
        <?php
        foreach ($data['users'] as $userdata) 
        {
            echo '<li>' . $userdata->user_id . '</li>';
            echo '<li>' . $userdata->user_name . '</li>';
            echo '<li>' . $userdata->user_email . '</li>';
            echo '<li>' . $userdata->password . '</li>';
            echo '<br><hl>';
        }
        ?>
    </ul>

</body>
</html>


