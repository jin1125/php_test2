<?php
session_start();
header('X-FRAME-OPTIONS:DENY');

require 'validation.php';

function h($str){
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$pageFlag = 0;

$errors = validation($_POST);

if (!empty($_POST['btn_confirm']) && empty($errors)) {
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
  <?php
    if(!isset($_SESSION['csrfToken'])) {
      $csrfToken = bin2hex(random_bytes(32));
      $_SESSION['csrfToken'] = $csrfToken;
    }
    $token = $_SESSION['csrfToken'];
  ?>

  <?php if(!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
    <?php echo '<ul>'; ?>
    <?php
      foreach($errors as $error) {
        echo '<li>' . $error . '</li>';
      }
    ?>
    <?php echo '</ul>'; ?>

  <?php endif; ?>

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
    homepage
    <input
      type="url"
      name="url"
      value="<?php if(!empty($_POST['url'])){echo h($_POST['url']) ;} ?>"
    >
    <br>
    seibetsu
    <input type="radio" name="gender" value="0"
      <?php if(isset($_POST['gender']) && $_POST['gender'] === '0') {
        echo 'checked';
      }
      ?>
    >man
    <input type="radio" name="gender" value="1"
    <?php if(isset($_POST['gender']) && $_POST['gender'] === '1') {
        echo 'checked';
      }
    ?>
    >woman
    <br>
    age
    <select name="age">
      <option value="">select</option>
      <option value="1">~19</option>
      <option value="2">20~29</option>
      <option value="3">30~39</option>
      <option value="4">40~49</option>
      <option value="5">50~59</option>
      <option value="6">60~</option>
    </select>
    <br>
    contact
    <textarea name="contact"><?php if(!empty($_POST['contact'])){echo h($_POST['contact']) ;} ?></textarea>
    <br>
    caution
    <input type="checkbox" name="caution" value="1">check
    <br>
    <input type="submit" name="btn_confirm" value="confirm">
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">
  </form>
<?php endif; ?>

<?php if($pageFlag === 1 ) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
    確認画面
    <form method="POST" action="input.php">
      name
      <?= h($_POST['your_name']); ?>
      <br>
      mail
      <?= h($_POST['email']); ?>
      <br>
      homepage
      <?= h($_POST['url']); ?>
      <br>
      seibetsu
      <?php
        if ($_POST['gender'] === '0') {
          echo 'man';
        }
        if ($_POST['gender'] === '1') {
          echo 'woman';
        }
      ?>
      <br>
      age
      <?php
        if ($_POST['age'] === '1') {
          echo '~19';
        }
        if ($_POST['age'] === '2') {
          echo '20~29';
        }
        if ($_POST['age'] === '3') {
          echo '30~39';
        }
        if ($_POST['age'] === '4') {
          echo '40~49';
        }
        if ($_POST['age'] === '5') {
          echo '50~59';
        }
        if ($_POST['age'] === '6') {
          echo '60~';
        }
      ?>
      <br>
      contact
      <?= h($_POST['contact']); ?>
      <br>

      <input type="submit" name="back" value="back">
      <input type="submit" name="btn_submit" value="submit">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ;?>">
      <input type="hidden" name="email" value="<?php echo h($_POST['email']);?>">
      <input type="hidden" name="url" value="<?php echo h($_POST['url']);?>">
      <input type="hidden" name="gender" value="<?php echo h($_POST['gender']);?>">
      <input type="hidden" name="age" value="<?php echo h($_POST['age']);?>">
      <input type="hidden" name="contact" value="<?php echo h($_POST['contact']);?>">
      <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']);?>">
    </form>
  <?php endif; ?>
<?php endif; ?>

<?php if($pageFlag === 2 ) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
    <?php
      require '../mainte/insert.php';
      insertContact($_POST);
    ?>


    送信が完了しました！
  <?php unset($_SESSION['csrfToken']); ?>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>