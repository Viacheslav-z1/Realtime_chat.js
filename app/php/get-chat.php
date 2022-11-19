<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= ' <li class="message__item outgoing">'. $row['msg'] .'</li>';
                }else {
                    $output .= '<li class="message__item ingoing">
          <div class="message__info">
            <img src="php/images/'.$row['img'].'" class="users__img">
            <p class="message__text">'. $row['msg'] .'</p>
          </div>
        </li>';
                }
            }
        }else{
            $output .= '<div class="text">У Вас ще немає повідомлень, напишіть щось, щоб почати спілкуватись</div>';
        }
        echo $output;
    }else{
        header("location: ../sign_in.php");
    }

?>