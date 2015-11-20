<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <script src="<?php echo js_url("authority_menu/authority.js"); ?>"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo css_url("manage_template/sb-admin.css");?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo css_url("manage_template/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo css_url("manage_template/plugins/morris.css");?>" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>

    </script>
    <script type="text/javascript">

    </script>
</head>

<body style="background-color:white">



<?php
        $attributes = array('class' => 'form col-md-12 center-block');
        echo form_open('weblog/index', $attributes);
        ?>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="keyword" placeholder="依功能查詢" style="width:30%;margin-top:10px;display: initial;" value="<?php echo isset($Keyword)=='1'?$Keyword:'' ?>">
                        &#9;　
                        <button type="submit" name="search" class="btn btn-info" value="搜尋" onclick="document.notice_form.submit();" >搜尋</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <h2>WebLog</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr><th></th>
                                <th>姓名</th>
                                <th>功能/節點</th>
                                <th>動作</th>
                                <th>內容</th>
                                <th>日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i< count($WeblogData);$i++){?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo $WeblogData[$i]['User_Name'] ?></td>
                                <td><?php echo $WeblogData[$i]['Node_Name'] ?></td>
                                <td><?php echo $WeblogData[$i]['Action'] ?></td>
                                <td><?php echo $WeblogData[$i]['Subject'] ?></td>
                                <td><?php echo $WeblogData[$i]['Mdy_Time'] ?></td>

                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
                </div>
                <?php echo $this->pagination->create_links(); ?>
            </div>
        <?php echo form_close(); ?>



   <!-- jQuery -->
   <script src="<?php echo js_url("manage_template/jquery.js");?>"></script>
   <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>
    <script>

    </script>

</body>

</html>
