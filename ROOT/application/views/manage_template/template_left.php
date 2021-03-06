<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo css_url("manage_template/sb-admin.css");?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo css_url("manage_template/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		function change_content(url,node){
			parent.frames['mainFrame'].location.href=url;

            $.ajax({
                url:"<?php echo base_url("manage_template/template_left"); ?>",
                data:"&node_name="+node,
                type : "POST",
                dataType:'text',
                error:function(){
                    alert("set_node失敗");
                },
                //傳送成功則跳出成功訊息
                success:function(){
                }
            });
		}
	</script>
</head>

<body style="margin-top:0">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse " role="navigation" style="margin-top: 50px;">
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <?php echo $menu ?>
            <!-- /.navbar-collapse -->
        </nav>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo js_url("manage_template/jquery.js");?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>


</body>

</html>
