<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Онлайн - чат</title>
  <link rel="stylesheet" href="css/style.min.css">
</head>

<body>

  <div class="container form__container">
    <form class="form__wrapper">
      <h1 class="form__title">
        Онлайн - чат
      </h1>
      <p class="form__message"></p>
      <label class="form__label">
        <p class="form__descr">Ім'я</p>
        <input placeholder="Ім'я" name="fname" type="text"  requried class="form__input form__name">
      </label>
      <label class="form__label">
        <p class="form__descr">Прізвище</p>
        <input placeholder="Прізвище" type="text" name="lname"  requried class="form__input form__lastName">
      </label>
      <label class="form__label">
        <p class="form__descr">Пошта</p>
        <input type="mail" placeholder="Пошта" name="email"  requried class="form__input form__mail">
      </label>
      <label class="form__label">
        <p class="form__descr">Пароль</p>
        <div class="form__password-hide">
          <input type="password" placeholder="Пароль" name="password"  requried class="form__input form__password">
          <button class="form__password-btn"></button>
        </div>
      </label>
      <label class="form__label">
        <p class="form__descr">Фото профілю</p>
        <input type="file" placeholder="Пароль" name="image" requried class="form__input form__img">
      </label>
      <button class="form__submit registration">Зареєструватись</button>
      <div class="form__box">
        <p class="form__text">Уже є аккаунт?</p>
        <a class="form__sign-in" href="sign_in.php" class="form__login">Увійти</a>
      </div>
    </form>
  </div>
  <script src="js/password_hide.js"></script>
  <script src="js/sign_up.js"></script>
  <script src="js/main.min.js"></script>

</body>

</html>