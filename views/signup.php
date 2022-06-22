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
    <title>Sign up</title>
    <link rel="stylesheet" href="../assets/stylus/sign.css">
    <link rel="stylesheet" href="../assets/stylus/base.css">
    <link rel="stylesheet" href="../assets/stylus/global.css">
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <script src="../static/scripts/showPassword.js" defer></script>
    <script src="../static/scripts/inputValidation.js" defer></script>
    <script src="../static/scripts/phoneNumberValidation.js" defer></script>
</head>
<body>
<a href="./home.php" class="home-link home-link_hover home-link_focus">Back to home</a>
<section class="sign">
    <header class="sign__header">
        <div class="sign__image"></div>
        <h1 class="sign__headline">Sign up</h1>
    </header>
    <form class="sign__form" method="post" action="./index.php?section=registration">
        <div class="sign__input-container">
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="text" class="sign__input fullname" name="fullname" placeholder="Josh Washington " required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="text" class="sign__input address" placeholder="Sretensk, st. Veshnih Vody, 3"
                       name="address" required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="tel" class="sign__input phone" placeholder="+7 (000) 000-00-00" name="phone" maxlength="18"
                       pattern="(^8|7|\+7)((\d{10})|(\s\(\d{3}\)\s\d{3}\s\d{2}\s\d{2}))" required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="email" class="sign__input email" placeholder="josh@gmail.com" name="email" required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="date" class="sign__input" name="birthday" required>
            </label>
            <label class="sign__input-wrap sign__input-wrap_underline sign__input-wrap_hover sign__input-wrap_focus">
                <input type="text" name="gender" list="gender" class="sign__input gender" maxlength="5"
                       placeholder="Gender" required>
                <datalist id="gender">
                    <option value="man">Man</option>
                    <option value="woman">Woman</option>
                </datalist>
            </label>
            <label class="sign__input-wrap sign__input-wrap_password sign__input-wrap_hover sign__input-wrap_focus">
                <input type="password" class="sign__input sign__input_password password" name="password"
                       placeholder="Password" required>
                <span class="sign__show-password"></span>
            </label>
        </div>
        <button type="submit" class="sign__btn sign__btn_hover sign__btn_focus">Sign up</button>
    </form>
    <footer class="sign__footer">
        <p class="sign__footer-content">
            Have already been with us? <a href="./signin.php" class="sign__link sign__link_hover sign__link_focus">Sign
                in</a>
        </p>
    </footer>
</section>
</body>
</html>