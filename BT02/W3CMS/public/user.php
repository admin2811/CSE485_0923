<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('link.php') ?>
    <title>User</title>
</head>

<body style="background: none; background-color: none">
    <!--Header-->
    <?php include('header.php') ?>
    <div class="container-fluid position-relative">
        <div class="row">
            <!--Sidebar-->
            <?php include('sidebar.php') ?>
            <!--Main-->
            <?php require('form.php') ?>
        </div>
    </div>
</body>
<?php include('script.php') ?>
<?php include('svg.php') ?>
</html>