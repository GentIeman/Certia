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
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <link rel="stylesheet" href="../assets/sass/styles/auth.css">
    <script src="../static/scripts/toggle-password.js" defer></script>
    <script src="../libs/inputmask.js" defer></script>
    <script src="../static/scripts/field-validation.js" defer></script>
</head>
<body class="page">
<a href="../index.php?page=home" class="home-link home-link_hover home-link_focus">Back to home</a>
<section class="auth">
    <div class="auth__container">
        <header class="auth__header">
            <h1 class="auth__headline">Sign in</h1>
        </header>
        <form class="auth__form form" method="post" action="../index.php?page=login&action=auth">
            <fieldset class="form__section form__section_active">
                <label for="" class="form__label form__label_full-width form__label_focus form__label_hover">
                    <input type="tel" class="form__input" name="phone" placeholder="Phone number" oninput="personalDataValidation(this, 'phone')" required>
                </label>
                <?php if(isset($_GET["phone-not-found"])): ?>
                    <p class="auth__error">Phone not found</p>
                <?php endif; ?>
                <label for="" class="form__label form__label_full-width form__label_focus form__label_hover form__label_password">
                    <input type="password" class="form__input form__input-password" name="password" placeholder="Password" oninput="personalDataValidation(this, 'password')" required autocomplete>
                    <span class="form__password-toggle" onclick="togglePassword(this, 'form__input-password')"></span>
                </label>
                <?php if(isset($_GET["wrong-password"])): ?>
                    <p class="auth__error">Invalid password</p>
                <?php endif; ?>
                <button type="submit" class="form__btn btn form__btn-next-step form__btn_hover form__btn_focus">Sign in</button>
            </fieldset>
        </form>
    </div>
    <footer class="auth__footer">
        <p class="auth__footer-text">
            First time with us?
            <a href="../index.php?page=registration" class="auth__link auth__link_hover auth__link_focus">Sign up</a>
        </p>
    </footer>
</section>
</body>
</html>