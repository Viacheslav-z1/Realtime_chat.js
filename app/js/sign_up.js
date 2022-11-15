const form = document.querySelector('.form__wrapper'),
     registerBtn = document.querySelector('.registration'),
      errorMessage = document.querySelector('.form__message');

registerBtn.addEventListener('click',(e)=>{
  e.preventDefault();
  errorMessage.classList.remove('show');
  errorMessage.classList.add('hide');
  const req = new XMLHttpRequest();
  req.open("POST","php/signup.php", true);
  req.onload = ()=>{
    if(req.readyState === XMLHttpRequest.DONE){
      if(req.status === 200){
        let data = req.response;
        if(data == 'success'){
          location.href = "users.php";
          form.reset();
        } else{
          errorMessage.classList.remove('hide');
          errorMessage.classList.add('show');
          errorMessage.textContent = data;
          console.log('a');
        }
      }
    }
  }

  let formData = new FormData(form);
  req.send(formData);
});