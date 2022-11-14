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
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <link rel="stylesheet" href="../assets/sass/styles/auth.css">
    <script src="../static/scripts/change-step.js" defer></script>
    <script src="../static/scripts/toggle-password.js" defer></script>
    <script src="../libs/inputmask.js" defer></script>
    <script src="../static/scripts/field-validation.js" defer></script>
</head>
<body class="page">
<a href="./index.php?page=home" class="home-link home-link_hover home-link_focus">Back to home</a>
<section class="auth">
    <div class="auth__container">
        <header class="auth__header">
            <h1 class="auth__headline">Sign up</h1>
        </header>
        <form class="auth__form form" method="post" action="./index.php?page=auth&action=registration">
            <fieldset class="form__section form__section_active">
                <legend class="form__legend">Personal data</legend>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="first-name" placeholder="First name" oninput="personalDataValidation(this, 'firstName')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="last-name" placeholder="Last name" oninput="personalDataValidation(this, 'lastName')" required>
                </label>
                <label for="" class="form__label form__label_full-width form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="patronymic" placeholder="Patronymic" oninput="personalDataValidation(this, 'patronymic')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="tel" class="form__input" name="phone" placeholder="Phone number" oninput="personalDataValidation(this, 'phone')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="passport" placeholder="Passport" oninput="personalDataValidation(this, 'passport')" required>
                </label>
                <label for="" class="form__label form__label_full-width form__label_focus form__label_hover">
                    <input type="email" class="form__input" name="email" placeholder="Email address" oninput="personalDataValidation(this, 'email')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="date" class="form__input" name="birthday" placeholder="Birthday" oninput="personalDataValidation(this, 'birthDate')" required dataformatas="">
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="gender" list="gender" oninput="personalDataValidation(this, 'gender')" placeholder="Gender" required>
                    <datalist id="gender">
                        <option value="man"></option>
                        <option value="woman"></option>
                    </datalist>
                </label>
                <label for="" class="form__label form__label_full-width form__label_password form__label_focus form__label_hover form__label_password">
                    <input type="password" class="form__input form__input-password" name="password" placeholder="Password" oninput="personalDataValidation(this, 'password')" required autocomplete>
                    <span class="form__password-toggle" onclick="togglePassword(this, 'form__input-password')"></span>
                </label>
                <button type="button" class="form__btn btn form__btn-next-step form__btn_disabled form__btn_hover form__btn_focus" onclick="changeStep(1)" disabled>Continue</button>
            </fieldset>
            <fieldset class="form__section">
                <legend class="form__legend">Location data</legend>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="city" placeholder="City" oninput="locationDataValidation(this, 'city')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="street" placeholder="Street" oninput="locationDataValidation(this, 'street')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="house" placeholder="House" oninput="locationDataValidation(this, 'house')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="building" placeholder="Building" oninput="locationDataValidation(this, 'building')">
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="flat" placeholder="Flat" oninput="locationDataValidation(this, 'flat')" required>
                </label>
                <label for="" class="form__label form__label_focus form__label_hover">
                    <input type="text" class="form__input" name="zip-code" placeholder="Zip code" oninput="locationDataValidation(this, 'zipCode')" required>
                </label>
                <button type="button" class="form__btn btn form__btn_hover form__btn_focus" onclick="changeStep(-1)">Step 1</button>
                <button type="submit" class="form__btn btn form__btn_submit form__btn_disabled form__btn_hover form__btn_focus" disabled>Sign up</button>
            </fieldset>
        </form>
    </div>
    <footer class="auth__footer">
        <p class="auth__footer-text">
            Have already been with us?
            <a href="./index.php?page=login" class="auth__link auth__link_hover auth__link_focus">Sign in</a>
        </p>
    </footer>
</section>
</body>
</html>