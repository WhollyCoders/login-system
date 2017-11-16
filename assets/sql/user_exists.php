<?php
    $sql = "SELECT * FROM `".$this->table."` 
    WHERE user_email='".$this->email."' LIMIT 1;";
    $result = $this->process_query($sql);
?>