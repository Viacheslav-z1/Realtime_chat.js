<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Ти: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<li class="users__user-li">
        <a class="users__user"  href="chat_page.php?user_id=' .$row['unique_id'].'">
          <div class ="img-wrapper">
            <img src="php/images/' .$row['img'] .'" class="users__img">
            <div class="status-dot '. $offline .'"><div class="circle"></div></div>
          </div>
          <div class="users__info">
            <h3 class="users__bio">' . $row['fname'] . " " . $row['lname'] .'</h3>
            <p class="users__last-message">'. $you . $msg .'</p>
          </div>
          </a>
        </li>';
    }
?>