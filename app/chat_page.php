<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: sign_in.php");
  }
?>
<?php include_once "header.php"; ?>
<body>

  <div class="container message__container">
            <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
    <div class="users__chat-box">
      <div class="users__user">
        <div class="users__chat-img-box">
          <a href="users.php" class="users__back">
           <img src="images/arrow_left.svg" alt="back" class="users__back-img">
          </a>
           <img src="php/images/<?php echo $row['img']; ?>" class="users__img">
        </div>
        <div class="users__info">
          <h3 class="users__bio"><?php echo $row['fname']. " " . $row['lname'] ?></h3>
          <p class="users__last-message"><?php echo $row['status']; ?>
          </p>
        </div>
      </div>
      <ul class="message__list">
      </ul>
      <div class="message__input-box">
        <form action="#" class="message__form typing-area">
          <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
           <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input autocomplete="off" name="message" class="message__input" placeholder="Введіть повідомлення..." type="text">
            <button class="message__search users__search">
              <img src="images/send.svg" alt="search" class="users__search-img">
            </button>
        </form>
      </div>
    </div>
  </div>

  <script src="js/chat.js"></script>
  <script src="js/main.min.js"></script>
</body>

</html>