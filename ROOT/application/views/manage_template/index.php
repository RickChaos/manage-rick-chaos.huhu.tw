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
	<link href="<?php echo css_url("manage_template/font-awesome/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo css_url("manage_template/plugins/morris.css");?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						 <small>佈告欄</small>
					</h1>
					<ol class="breadcrumb">
						<li class="active">
							<i class="fa fa-dashboard"></i>
						</li>
					</ol>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">

				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 待辦事項</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<a href="#" class="list-group-item">
									<span class="badge">just now</span>
									<i class="fa fa-fw fa-calendar"></i> Calendar updated
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">4 minutes ago</span>
									<i class="fa fa-fw fa-comment"></i> Commented on a post
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">23 minutes ago</span>
									<i class="fa fa-fw fa-truck"></i> Order 392 shipped
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">46 minutes ago</span>
									<i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">1 hour ago</span>
									<i class="fa fa-fw fa-user"></i> A new user has been added
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">2 hours ago</span>
									<i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">yesterday</span>
									<i class="fa fa-fw fa-globe"></i> Saved the world
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">two days ago</span>
									<i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
								</a>
							</div>
							<div class="text-right">
								<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!--完成事項-->
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 完成事項</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<a href="#" class="list-group-item">
									<span class="badge">just now</span>
									<i class="fa fa-fw fa-calendar"></i> Calendar updated
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">4 minutes ago</span>
									<i class="fa fa-fw fa-comment"></i> Commented on a post
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">23 minutes ago</span>
									<i class="fa fa-fw fa-truck"></i> Order 392 shipped
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">46 minutes ago</span>
									<i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">1 hour ago</span>
									<i class="fa fa-fw fa-user"></i> A new user has been added
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">2 hours ago</span>
									<i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">yesterday</span>
									<i class="fa fa-fw fa-globe"></i> Saved the world
								</a>
								<a href="#" class="list-group-item">
									<span class="badge">two days ago</span>
									<i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
								</a>
							</div>
							<div class="text-right">
								<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>

				</div>
			</div>
			<!-- /.row -->


        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo js_url("manage_template/jquery.js");?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo js_url("manage_template/plugins/morris/raphael.min.js");?>"></script>
    <script src="<?php echo js_url("manage_template/plugins/morris/morris.min.js");?>"></script>
    <script src="<?php echo js_url("manage_template/plugins/morris/morris-data.js");?>"></script>

</body>

</html>
