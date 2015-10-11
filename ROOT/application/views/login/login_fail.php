<html>
<head>
    <script>
        function redirect_login_page(){
            parent.parent.window.location.href='http://manage-rick-chaos.huhu.tw/login/fail/<?php echo $fail_type?>';
        }
        redirect_login_page();
    </script>
</head>
</html>