<?php
$sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` ( 
  `user_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
  `user_email` VARCHAR(100) NOT NULL , 
  `user_firstname` VARCHAR(100) NULL , 
  `user_lastname` VARCHAR(100) NULL , 
  `user_phone` VARCHAR(20) NULL , 
  `user_username` VARCHAR(100) NOT NULL , 
  `user_hashed_password` VARCHAR(100) NOT NULL , 
  `user_confirm_code` VARCHAR(100) NOT NULL , 
  `user_confirmed` INT NOT NULL DEFAULT '0' , 
  `user_date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  UNIQUE(`user_username`, `user_hashed_password`),
  PRIMARY KEY (`user_ID`)
  ) ENGINE = InnoDB;";
$result = $this->process_query($sql);
?>