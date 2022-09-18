<?php
session_start();
$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $post = filter_input_array(INPUT_POST, $_POST);
    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === ''){
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email';
    }
    if ($post['contact'] === ''){
        $error['contact'] = 'blank';
    }
    if (count($error) === 0){
        //エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else{
    if (isset($_SESSION['form'])){
        $post = $_SESSION['form'];
    }
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
<body>
    <div class ="form">
        <div class="formProgress">
            <div class="progress-this">01. 情報入力</div>
            <hr>
            <div class="progress">02. 内容確認</div>
            <hr>
            <div class="progress">03. 送信完了</div>
        </div>
        <div class="formInner">
    <!-- お問合せフォーム画面 -->
        <form action="index.php" method="POST" novalidate>
            <div class="contTtl">
            <h4>CONTACT</h4>
            <p>お問い合わせ</p>
            </div>
            <div class="form-group">
            <label for="inputName">お名前<span>*</label>
            <input type="text" name="name" id="inputName" class="form-control" value="<?php echo htmlspecialchars($post['name']); ?>" required autofocus>
                <?php if ($error['name'] === 'blank'): ?>
                <p class="error_msg">※お名前をご記入下さい</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
            <label for="inputEmail">メールアドレス<span>*</label>
            <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo htmlspecialchars($post['email']); ?>" required>
                <?php if ($error['email'] === 'blank'): ?>
                <p class="error_msg">※メールアドレスをご記入下さい</p>
                <?php endif; ?>
                <?php if ($error['email'] === 'email'): ?>
                <p class="error_msg">※メールアドレスを正しくご記入下さい</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
            <label for="inputContent">お問い合わせ内容<span>*</label>
            <textarea name="contact" id="inputContent" rows="10" class="form-control" required><?php echo htmlspecialchars($post['contact']); ?></textarea>
                <?php if ($error['contact'] === 'blank'): ?>
                <p class="error_msg">※お問い合わせ内容をご記入下さい</p>
                <?php endif; ?>
            </div>
            <button type="submit">確認画面へ</button>
            </div>
        </form>
        </div>
        </div>
        <div class="backToTop">Top</div>
  </main>

  <footer>
    <div class="fnav-menu">
      <div class="logo-nav">
        <p>Heartily & Airis YOGA</p>
        <div class="logo-navImg">
          <a href="https://www.instagram.com/airisyoga_heartily/"><img src="img/icon/instagram (1).png"></a>
          <img src="img/icon/line.png">
        </div>
      </div>

      <div class="con-nav">
        <ul>
          <li class="con-navTtl">SALON</li>
          <li><a href="vos.html">VOSサロンケア</a></li>
          <li><a href="lashaddict.html">Lashaddict</a></li>
          <li><a href="hairaddict.html">Hairaddict</a></li>
          <li><a href="facial.html">Facial</a></li>
          <li><a href="body.html">Body</a></li>
          <li><a href="dastumo.html">Hair Removal</a></li>
        </ul>
        <ul>
          <li class="con-navTtl">PRODUCT</li>
          <li><a href="v3.html">V3</a></li>
          <li><a href="vos.html">VOS</a></li>
          <li><a href="avon.html">AVON</a></li>
          <li><a href="lashaddict.html">Lashaddict</a></li>
          <li><a href="hairaddict.html">Hairaddict</a></li>
          <li><a href="hepaskin.html">HEPASKIN</a></li>
        </ul>
        <ul>
          <li class="con-navTtl"><a href="yoga.html">YOGA</a></li>
        </ul>
      </div>
    </div>

    <div class="resfnav-menu">
      <div class="resfnav-logo">
        Heartily & Airis YOGA
      </div>
      <div class="resfnav-text">
        Copyright ©︎ 2022 Heartily & Airis YOGA
      </div>
    </div>
  </footer>

  <script src="js/plugin/jquery-3.6.0.min.js"></script>
  <script src="js/plugin/slick.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>