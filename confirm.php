<?php
session_start();

//入力画面からのアクセスでなければ戻す
if (!isset($_SESSION['form'])){
    header('Location: index.php');
    exit();
} else{
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // メールを送信する
    $to = 'me@example.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前：{$post['name']}
メールアドレス：{$post['email']}
内容：{$post['contact']}
EOT;
    mb_send_mail($to, $subject, $body, "from: {$from}");

    //セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.html');
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/hamburger-menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&family=Dancing+Script:wght@600&family=Lusitana:wght@700&family=MonteCarlo&family=Poppins&family=Prata&family=Raleway:ital,wght@1,500&family=Russo+One&family=Sriracha&family=Ubuntu:wght@300&family=Waterfall&family=Zen+Kurenaido&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/plugin/slick.css">
  <link rel="stylesheet" href="css/plugin/slick-theme.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/508e101788.js" crossorigin="anonymous"></script>
  <script src="js/hamburger-menu.js"></script>
  <title>Heartily</title>
</head>
<body>
  <header>
    <nav>
      <ul class="nav-menu">
        <a href="index.html">
          <img src="img/icon/logo.png">
        </a>
        <li class="child"><a href="">SALON</a>
          <ul class="nav-submenu">
            <li><a href="vos.html">VOSサロンケア</a></li>
            <li><a href="lashaddict.html">Lashaddict</a></li>
            <li><a href="hairaddict.html">Hairaddict</a></li>
            <li><a href="facial.html">Facial</a></li>
            <li><a href="body.html">Body</a></li>
            <li><a href="dastumo.html">Hair Removal</a></li>
          </ul>
        </li>
        <li class="child"><a href="">PRODUCT</a>
          <ul class="nav-submenu">
            <li><a href="v3.html">V3</a></li>
            <li><a href="vos.html">VOS</a></li>
            <li><a href="avon.html">AVON</a></li>
            <li><a href="lashaddict.html">Lashaddict</a></li>
            <li><a href="hairaddict.html">Hairaddict</a></li>
            <li><a href="hepaskin.html">HEPASKIN</a></li>
          </ul>
        </li>
        <li><a href="yoga.html">YOGA</a></li>
        <li><a href="index.php">CONTACT</a></li>
      </ul>
    </nav>
    <!-- ハンバーガーメニュー -->
    <div class="hamburger">
    <div class="hamburger-menu">
      <input type="checkbox" id="menu-btn-check">
      <label for="menu-btn-check" class="menu-btn"><span></span>
      </label>
      <div class="hamburger-menu-content">
        <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="#">SALON</a></li>
          <li class="submenu"><a href="vos.html">　VOSサロンケア</a></li>
          <li class="submenu"><a href="lashaddict.html">　Lashaddict</a></li>
          <li class="submenu"><a href="hairaddict.html">　Hairaddict</a></li>
          <li class="submenu"><a href="facial.html">　Facial</a></li>
          <li class="submenu"><a href="body.html">　Body</a></li>
          <li class="submenu"><a href="dastumo.html">　Hair Removal</a></li>

          <li><a href="#">Product</a></li>
          <li class="submenu"><a href="v3.html">　V3</a></li>
          <li class="submenu"><a href="vos.html">　VOS</a></li>
          <li class="submenu"><a href="avon.html">　AVON</a></li>
          <li class="submenu"><a href="lashaddict.html">　Lashaddict</a></li>
          <li class="submenu"><a href="hairaddict.html">　Hairaddict</a></li>
          <li class="submenu"><a href="hepaskin.html">　HEPASKIN</a></li>

          <li><a href="yoga.html">YOGA</a></li>
          <li class="hamburger-sns"><a href="#"><img src="img/icon/line.png"></a></li>
          <li class="hamburger-sns"><a href="https://www.instagram.com/airisyoga_heartily/"><img src="img/icon/instagram (1).png"></a></li>
        </ul>
      </div>
      <div class="hamburger-backcolor"></div>
    </div>
    </div>
    </div>
</header>
<div class="form">
<div class="formProgress">
            <div class="progress">01. 情報入力</div>
            <hr>
            <div class="progress-this">02. 内容確認</div>
            <hr>
            <div class="progress">03. 送信完了</div>
        </div>
    <div class="formInner">
    <!-- お問合せフォーム画面 -->
    <div class="container">
        <form action="" method="POST">
        <div class="contTtl">
            <p>以下の内容で送信いたしますか？</p>
            </div>
            <div class="form-group">
                <label for="inputName">お名前</label>
                <p class="display_item"><?php echo htmlspecialchars($post['name']); ?></p> 
            </div>
            <div class="form-group">
                <label for="inputEmail">メールアドレス</label>
                <p class="display_item"><?php echo htmlspecialchars($post['email']); ?></p>
            </div>
            <div class="form-group">
                <label for="inputContent">お問い合わせ内容</label>
                <p class="display_item"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
            </div>
                    <a href="index.php">戻る</a>
                    <button type="submit">送信する</button>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>