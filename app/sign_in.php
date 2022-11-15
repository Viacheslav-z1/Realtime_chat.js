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
      <p class="form__message">Message</p>
      <label class="form__label">
        <p class="form__descr">Пошта</p>
        <input type="mail" placeholder="Пошта" class="form__input form__mail">
      </label>
      <label class="form__label">
        <p class="form__descr">Пароль</p>
        <div class="form__password-hide">
          <input type="password" placeholder="Пароль" class="form__input form__password">
          <button class="form__password-btn"></button>
        </div>
      </label>
      <button class="form__submit">Увійти</button>
      <div class="form__box">
        <p class="form__text">Немає аккаунту?</p>
        <a class="form__sign-in" href="index.php" class="form__login">Зареєструватись</a>
      </div>
    </form>
  </div>
  <script src="js/password_hide.js"></script>
  <script src="js/main.min.js"></script>

</body>

</html>