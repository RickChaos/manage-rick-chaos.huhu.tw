<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>會員中心</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>

</head>

<body>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#home">個人資料</a></li>
    <li><a href="#profile">Profile</a></li>
    <li><a href="#messages">Messages</a></li>
    <li><a href="#settings">Settings</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home">1</div>
    <div class="tab-pane" id="profile">2</div>
    <div class="tab-pane" id="messages">3</div>
    <div class="tab-pane" id="settings">4</div>
</div>

<script>
    $(function () {
        $('#myTab a:first').tab('show');
    })

    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>
</body>
</html>
