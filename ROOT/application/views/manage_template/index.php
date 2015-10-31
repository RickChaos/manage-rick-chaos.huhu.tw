<!DOCTYPE html>

<head>
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
							<i class="fa fa-dashboard"></i><a href="www.google.com"> News. </a>
						</li>
					</ol>
				</div>
			</div>
			<!-- /.row -->

			<!-- 事項專區-->
			<div class="row">

				<div class="col-lg-6 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 待辦事項</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php foreach($Todolist as $Todolist_Item):?>
								<a href="#" class="list-group-item">
									<span class="badge"><?php echo substr($Todolist_Item['PostTime'],0,10) ?></span>
									<i class="fa fa-fw fa-calendar"></i> <?php echo $Todolist_Item['Subject'] ?>
								</a>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<!--完成事項-->
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 完成事項</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php foreach($Completion as $Completion_Item):?>
									<a href="#" class="list-group-item">
										<span class="badge"><?php echo $Completion_Item['Name'] ?></span>
										<i class="fa fa-fw fa-calendar"></i> <?php echo $Completion_Item['Subject'] ?>
									</a>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- 人員專區-->
			<div class="row">

				<!--人員列表-->
				<?php for($i=0 ; $i< count($Personal) ;$i++){
						?>
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i><?php echo $Personal[$i]['Name']?></h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php for($j=0 ; $j < count($PersonalData);$j++) {
									if ($PersonalData[$j]['Class_Id'] == $Personal[$i]['Class_Id']) {
										?>
										<a href="#" class="list-group-item">
											<span
												class="badge"><?php echo substr($PersonalData[$j]['PostTime'], 0, 10) ?></span>
											<i class="fa fa-fw fa-calendar"></i> <?php echo $PersonalData[$j]['Subject'] ?>
										</a>
									<?php }
								}?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>


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
