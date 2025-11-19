<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css?v=<?php echo time(); ?>'>
    <title>Staff</title>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a5f0d8af53.js" crossorigin="anonymous"></script>
<style>
    table,th,td{
        border: 1px solid black;
    }
</style>
</head>

<body>
    <!-- Navigation Bar -->
<?php
    $page = "home";
    include 'navigation_bar.php';
    ?>

    <div class="row" style="background-image: url(images/home-background.jpg);background-size:cover;">

    <div class="container" style="background-color: rgba(255, 255, 255, 0.8);border-radius:10px;border:1px solid #B6B1B1;height:500px;margin:3%;width:94%;">

    <h2 style="text-align:center;padding:1%;height:auto;">Student Feedback</h2>
    <div style="overflow: scroll;height:395px;">
    <!-- Retrieving the feedbak messages from the database and display them on the table -->
    <table style="height:auto;margin-left:auto;margin-right:auto;">
        <tr>
            <th style="width:100px;text-align:center;">Name</th>
            <th style="width:300px;text-align:center;">Email</th>
            <th style="width:500px;text-align:center;">Message</th>
        </tr>
        <?php include 'db.php';
                            $q = "SELECT * FROM `feedback`";
                            $rs = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_array($rs)) {
                            ?>
        <tr>
            <td><?php print($row['name']); ?></td>
            <td><?php print($row['email']); ?></td>
            <td><?php print($row['feedback_msg']); ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
    
    </div>
    </div>
</body>
<html>