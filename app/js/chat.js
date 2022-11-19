const form = document.querySelector(".message__form"),
incoming_id = document.querySelector(".incoming_id").value,
inputField = document.querySelector(".message__input"),
sendBtn = document.querySelector(".message__search"),
chatBox = document.querySelector(".message__list");





sendBtn.addEventListener('click',(e)=>{
  e.preventDefault();

  let req = new XMLHttpRequest();
  req.open("POST", "php/insert-chat.php", true);
  req.onload = () => {
    if (req.readyState === XMLHttpRequest.DONE) {
      if (req.status === 200) {
        inputField.value = "";
        scrollToBottom()
      }
    }
  }
  let formData = new FormData(form);
  req.send(formData);
})


setInterval(() =>{
    let req = new XMLHttpRequest();
    req.open("POST", "php/get-chat.php", true);
    req.onload = ()=>{
      if(req.readyState === XMLHttpRequest.DONE){
          if(req.status === 200){
            let data = req.response;
            chatBox.innerHTML = data;
          }
      }
    }
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("incoming_id="+incoming_id);
},300);


function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
