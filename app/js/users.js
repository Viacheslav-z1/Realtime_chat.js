
const usersList = document.querySelector('.users__list'),
  searchBtn = document.querySelector('.users__search'),
  searchBar = document.querySelector('.users__input');

searchBtn.addEventListener('click', () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
  setTimeout(() => {
    searchBar.classList.remove("active");
  }, 4000);
})



const search = setInterval(() => {
  let req = new XMLHttpRequest();
  req.open("GET", "php/users.php", true);
  req.onload = () => {
    if (req.readyState === XMLHttpRequest.DONE) {
      if (req.status === 200) {
        let data = req.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  }
  req.send();
}, 600);

