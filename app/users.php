
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: sign_in.php");
  }
?>



<?php include_once "header.php"; ?>

<body>

  <header class="header">
    <div class="container header__container">
                <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
      <div class="header__inner">
        <div class="header__box">
          <img src="php/images/<?php echo $row['img']; ?>" class="header__img">
          <div class="header__info">
            <h3 class="header__bio"><?php echo $row['fname'] . " " . $row['lname'] ?></h3>
            <p class="header__last-active"><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="header__btn">Вийти</a>
      </div>
    </div>
  </header>
  <div class="users__container">
    <div class="users__box">
      <label class="users__label">
        <input class="users__input" type="text" placeholder="Пошук користувачів">
        <button class="users__search">
          <img src="images/search.svg" alt="search" class="users__search-img">
        </button>
      </label>
      <ul class="users__list">
      </ul>
    </div>
  </div>
<script src="js/users.js"></script>
  <script src="js/main.min.js"></script>
</body>

</html>