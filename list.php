<?php
$file_list = glob('test/*.json');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
</head>
<body>
<form method="post" action="test.php">
    <h3>Выберите теста для прохождения:</h3>
    <?php
    $c = 1;
    foreach ($file_list as $key => $file) : ?>
        <label><input type="radio" name="test" value="<?php echo $file; ?>" required>Test <?php echo $c ?></label><br>
        <?php $c++; ?>
    <?php endforeach; ?>
    <input type="submit" value="Пройти тест">
</form>
</body>
</html>