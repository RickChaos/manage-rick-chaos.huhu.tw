<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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

    <script>
        <?php if(isset($rtnadd)){ ?>
        alert('<?php echo $rtnadd ?>');
        <?php } ?>
        function checkSubject(){
            if($('input[name="title"]').val()=='') {
                alert('不可輸入空白!');
                return;
            }
            document.getElementById('notice_add_form').submit();

        }
    </script>
</head>

<body style="background-color:white">

    
            <div class="container-fluid">

                <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 佈告欄類別-新增</h3>
                            </div>
                        <?php
                        $attributes = array('class' => 'form col-md-12 center-block','name' => 'notice_add_form', 'id' => 'notice_add_form');
                        echo form_open('content/notice_class_add', $attributes);
                        ?>
                            <div class="panel-body">
                                <div class="list-group">
                                    <div class="form-group">
                                        <label>標題</label>
                                        <input class="form-control" name="Subject">
                                    </div>
                                    <button type="button" class="btn btn-default" onclick="javascript:checkSubject();">送出</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>



   <!-- jQuery -->
   <script src="<?php echo js_url("manage_template/jquery.js");?>"></script>
   <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>


</body>

</html>
