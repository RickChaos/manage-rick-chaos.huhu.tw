<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

</head>

<frameset id="Frame" rows="55,*" framespacing="0" frameborder="no" border="0">
	<frame id="topFrame" name="topFrame" scrolling="No" noresize="noresize" title="topFrame" src="<?php echo base_url("test_top.php")?>">
	<frameset id="menuFram" cols="250,*" framespacing="0" frameborder="no" border="0">
		<frame id="leftFrame" name="leftFrame" scrolling="auto" noresize="noresize" title="leftFrame" src="<?php echo base_url("manage_template/test_left")?>">
		<frame id="mainFrame" name="mainFrame" title="mainFrame" src="index.php">
	</frameset>
</frameset>

</html>
