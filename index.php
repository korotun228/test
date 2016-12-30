<?php
 header("Content-type: text/html; charset=utf-8");
 error_reporting(-1);
 require_once'func.php';

 if(!empty($_POST)){
     save_mess();
     header("Location: {$_SERVER['PHP_SELF']}");
     exit;
 }
$messages = get_mess();
$messages = array_mess($messages);
//print_arr($messages);
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга</title>

    <style>
        .message{
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

    <form action="" method="post">
        <p>
            <label for="name"> Имя: </label><br>
            <input type="text" id="name" name="name">
        </p>
        <p>
            <label for="text"> Текст: </label><br>
            <textarea name="text" id="text"></textarea>
        </p>
        <input type="submit" value="Написать">
    </form>

<hr>

<?php if(!empty($messages)):?>
    <?php foreach($messages as $message): ?>
        <?php $message = get_format_message($message);?>
        <div class="message">
            <p>Автор:<?=$message[0]?> | Дата: <?=$message[2]?></p>
            <div><?=nl2br(htmlspecialchars($message[1]))?></div>
        </div>
    <?php endforeach; ?>
<?php endif?>;

</body>
</html>
