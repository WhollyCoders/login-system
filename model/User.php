<?php 
// require('../../__CONNECT/wmi-connect.php');
// require('../assets/php/functlib.php');
class User
{
  public $connection;
  public $database  = 'whollymath';
  public $table     = 'users';
  public $id;
  public $username;
  public $hashed_password;
  public $email;
  public $firstname;
  public $lastname;
  public $phone;
  public $confirm_code;
  public $confirmed = 0;
  public $baseUrl = 'http://localhost/__PROJECTS/login-system/views/users/confirm.php';
  public $date_added;
  public $data = array();
  public $json;

  public function __construct($connection)
  {
    $this->connection = $connection;
    $this->create_table();
  }
  public function confirm($data)
  {
    $this->username     = $data['username'];
    $this->confirm_code = $data['code'];
  }





  public function confirm_user($details){
    $this->username = $details['username'];
    $this->code     = $details['code'];

    $sql = "SELECT * FROM users WHERE user_username='$this->username';";
    $result = mysqli_query($this->connection, $sql);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $db_code = $row['user_confirm_code'];
        if($this->code == $db_code){

        }else{
          echo('ERROR!!! Invalid Code: Unable to verify email<br>');
        }

        $sql1 = "UPDATE users SET user_confirmed='1';";
        $result1 = mysqli_query($this->connection, $sql1);
        $sql2 = "UPDATE users SET user_confirm_code='0';";
        $result2 = mysqli_query($this->connection, $sql2);
        echo('Email Registered Successfully!!!<br> <a href="./login.php?username='.$this->username.'">Login</a>');

      }
    }else{
      echo('There is a problem verifying your email address...<br><a href="./register.php">Click Here To Re-register</a>');
    }

  }















  public function create_table()
  {
    require('../../assets/sql/create_users_table.php');
  }
  public function get_confirm_URL()
  {
    $query_string = $this->get_query_string();
    return $this->baseUrl.$query_string;
  }
  public function get_query_string()
  {
    return $query_string = '?username='.$this->username.'&code='.$this->confirm_code;
  }
  public function insert()
  {
    require('../../assets/sql/insert_user.php');
  }
  public function login($params)
  {
    $this->set_login_params($params);
    if($this->user_exists){

    }
  }

  public function process_query($sql)
  {
    return $result = mysqli_query($this->connection, $sql);
  }

  public function recover($email)
  {

  }

  public function register($params)
  {
    $this->set_params($params);
    $this->confirm_code = md5(rand().time().rand());
    $this->insert();
    $this->send_confirm_email();
  }

  public function send_confirm_email()
  {
    $message = 'To confirm your email<br>Click the link below to verify your account<br>
    <a href="'.$this->get_confirm_URL().'">Confirm Email Address</a>';

    require_once('../../../_email-service/PHPMailerAutoload.php');
    $Mailer = new PHPMailer();

    $Mailer->isSMTP();
    $Mailer->SMTPAuth = true;
    $Mailer->SMTPSecure = 'ssl';
    $Mailer->Host = 'smtp.gmail.com';
    $Mailer->Port = '465';
    $Mailer->isHTML();
    $Mailer->Username = 'whollycoders@gmail.com';
    $Mailer->Password = 'whollymath';
    $Mailer->SetFrom('no-reply@whollycoders.org');
    $Mailer->Subject = 'RE: WhollyCoders Email Confirmation...';
    $Mailer->Body = $message;
    $Mailer->AddAddress($this->email, $this->username);

    if($Mailer->Send()){echo('Your email (<strong>'.$this->email.'</strong>) was registered SUCCESSFULLY!!!<br>Please check email to VERIFY your registration...');}else{echo('There has been an ERROR!!!');}

  }

  public function set_login_params($params)
  {
    $this->username         = strtolower($params['username']);
    $this->hashed_password  = md5(md5($params['password']));
  }

  public function set_params($params)
  {
    $this->username         = strtolower($params['username']);
    $this->hashed_password  = md5(md5($params['password']));
    $this->email            = $this->username;
    $this->firstname        = $params['firstname'];
    $this->lastname         = $params['lastname'];
  }

  public function user_exists()
  {
    require('../../assets/sql/user_exists.php');
    if($result)
    {
      $rows = mysqli_fetch_assoc($result);
      $this->data = array(
        'id'          =>     $row['user_ID'],  
        'email'       =>     $row['user_email'], 
        'firstname'   =>     $row['user_firstname'], 
        'lastname'    =>     $row['user_lastname'], 
        'phone'       =>     $row['user_phone'], 
        'username'    =>     $row['user_username'],
        'password'    =>     $row['user_password'],
        'code'        =>     $row['user_code'],
        'status'      =>     $row['user_status'],
        'date_added'  =>     $row['user_date_added']
      );
      return true;
    }else
    {
      return false;
    }
  }


}
// $User = new User($connection);
// prewrap($User);
?>