<?php
  $sql =   "INSERT INTO `".$this->table."` (
    `user_ID`, 
    `user_email`, 
    `user_firstname`, 
    `user_lastname`, 
    `user_phone`, 
    `user_username`, 
    `user_hashed_password`, 
    `user_confirm_code`, 
    `user_confirmed`, 
    `user_date_added`
    ) VALUES (
      NULL, 
      '$this->email', 
      '$this->firstname', 
      '$this->lastname', 
      '$this->phone', 
      '$this->username', 
      '$this->hashed_password', 
      '$this->confirm_code', 
      '$this->confirmed', 
      CURRENT_TIMESTAMP
    );";
  $result = $this->process_query($sql);
  prewrap($sql);
?>