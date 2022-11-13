inputPassword = document.querySelector('.form__password');
passwordHideBtn = document.querySelector('.form__password-btn');

passwordHideBtn.addEventListener('click', function (e) {
  e.preventDefault();
  if (inputPassword.type == 'password') {
    passwordHideBtn.classList.add('active');
    inputPassword.type = 'text';
  } else {
    passwordHideBtn.classList.remove('active');
    inputPassword.type = 'password';
  }
})