<?php
header('X-FRAME-OPTIONS:DENY');

// if (!empty($_POST)) {
//   var_dump($_POST);
// }

function h($str){
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$pageFlag = 0;

if (!empty($_POST['btn_confirm'])) {
  $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php if($pageFlag === 0 ) : ?>
  入力画面
  <form action="input.php" method="POST">
    name
    <input
      type="text"
      name="your_name"
      value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name']) ;} ?>"
    >
    <br>
    mail
    <input
      type="email"
      name="email"
      value="<?php if(!empty($_POST['email'])){echo h($_POST['email']) ;} ?>"
    >
    <br>
    <input type="submit" name="btn_confirm" value="confirm">
  </form>
<?php endif; ?>

<?php if($pageFlag === 1 ) : ?>
  確認画面
  <form method="POST" action="input.php">
    name
    <?= h($_POST['your_name']); ?>
    <br>
    mail
    <?= h($_POST['email']); ?>
    <br>
    <input type="submit" name="back" value="back">
    <input type="submit" name="btn_submit" value="submit">
    <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ;?>">
    <input type="hidden" name="email" value="<?php echo h($_POST['email']) ;?>">
</form>
<?php endif; ?>

<?php if($pageFlag === 2 ) : ?>
  送信が完了しました！
<?php endif; ?>
</body>
</html>