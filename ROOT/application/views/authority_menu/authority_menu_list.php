<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>選單維護</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css"); ?>" rel="stylesheet">

</head>

<body>

<div style="width:100%;padding:50px">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <input class="form-control" name="keyword" placeholder="依姓名查詢" style="width:30%;margin-top:10px;display: initial;">
            單位:
            <select name="notice_class" id="unit_select">
                <option value="">
            </select>
            <button type="button" class="btn btn-info" >搜尋</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8"">
            <h2>選單權限設定</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-1">項次</th>
                        <th class="col-md-2">單位</th>
                        <th class="col-md-3">職稱</th>
                        <th class="col-md-6">名稱</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>不告訴你</td>
                        <td>不告訴你</td>
                        <td>毅毅</td>
                    </tr>
                    <tr style="background-color: #BBBABA">
                        <td>2</td>
                        <td>不告訴你</td>
                        <td>不告訴你</td>
                        <td>小超</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>不告訴你</td>
                        <td>不告訴你</td>
                        <td>泰豐</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</body>

</html>
