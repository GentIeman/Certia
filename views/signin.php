<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>Sign in</title>
    <link rel="stylesheet" href="../assets/stylus/sign.css">
    <link rel="stylesheet" href="../assets/stylus/base.css">
    <link rel="stylesheet" href="../assets/stylus/global.css">
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <script src="../static/scripts/showPassword.js" defer></script>
    <script src="../static/scripts/phoneNumberValidation.js" defer></script>
    <script src="../static/scripts/tooltip.js" defer></script>
</head>
<body>
<a href="./home.php" class="home-link home-link_hover home-link_focus">Back to home</a>
<section class="sign">
    <header class="sign__header">
        <div class="sign__image"></div>
        <h1 class="sign__headline">Sign in</h1>
    </header>
    <form class="sign__form" method="post" action="./index.php?section=login">
        <div class="sign__input-container">
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="tel" name="phone" class="sign__input phone" placeholder="Telephone" maxlength="18"
                       pattern="(^8|7|\+7)((\d{10})|(\s\(\d{3}\)\s\d{3}\s\d{2}\s\d{2}))" required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_password sign__input-wrap_hover sign__input-wrap_focus">
                <input type="password" name="password" class="sign__input sign__input_password" placeholder="Password"
                       required>
                <span class="sign__show-password"></span>
            </label>
        </div>
        <button type="submit" class="sign__btn sign__btn_hover sign__btn_focus">Sign in</button>
    </form>
    <footer class="sign__footer">
        <p class="sign__footer-content">
            First time with us? <a href="./signup.php" class="sign__link sign__link_hover sign__link_focus">Sign up</a>
        </p>
    </footer>
</section>
<div class="tooltip-wrap <?php if (isset($_GET["passwordError"]) === true || isset($_GET["authError"]) === true): ?>tooltip-wrap_show<?php endif; ?>">
    <div class="tooltip">
        <div class="tooltip__content">
            <?php if (isset($_GET["passwordError"]) === true): ?>
                <p class="tooltip__text">Invalid password</p>
            <?php endif; ?>
            <?php if (isset($_GET["authError"]) === true): ?>
                <p class="tooltip__text">User not found</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>