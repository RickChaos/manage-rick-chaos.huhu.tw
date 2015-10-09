<html>

<head>

</head>

<body>
<?php foreach ($test as $test_item): ?>

    <h3><?php echo $test_item['id'] ?></h3>
    <div class="main">
        <?php echo $test_item['name'] ;?>
    </div>
    <p><?php echo $test_item['value'] ?></p>

<?php endforeach ?>
</body>
</html>