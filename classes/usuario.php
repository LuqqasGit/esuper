<?php
require_once("repositorioUsuarios.php");

class Usuario {

  private $firstname;
  private $lastname;
  private $email;
  private $username;
  private $id;
  private $password;
  private $avatar;

  public function __construct($id, $firstname, $lastname, $email, $username, $password, $avatar = null) {
    $this->id = $id;
    $this->firstname =$firstname;
    $this->lastname =$lastname;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
  }

  public function setFirstname($firstname){
    $this->firstname = $firstname;
  }
  public function getFirstname(){
    return $this->firstname;
  }
  public function setLastname($lastname){
    $this->lastname = $lastname;
  }
  public function getLastname(){
    return $this->lastname;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setUsername($username){
    $this->username = $username;
  }
  public function getUsername(){
    return $this->username;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getId(){
    return $this->id;
  }
  public function setPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
  public function getPassword(){
    return $this->password;
  }

  // Agregar campo avatar en el signup form

  // public function getAvatar(){
  //   $name = "img/" . $this->getId();
  //   $matching = glob($name . ".*");
  //
  //   $info = pathinfo($matching[0]);
  //   $ext = $info['extension'];
  //
  //   return $name . "." . $ext;
  // }
  public function setAvatar($avatar) {
    if ($avatar["error"] == UPLOAD_ERR_OK) {

      $path = "img/";

      if (!is_dir($path)) {
        mkdir($path, 0777);
      }

      $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

      move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
    }
  }

  public function guardar(RepositorioUsuarios $repo) {
    $repo->guardar($this);
  }

  public function toArray() {
    return [
      "id" => $this->getId(),
      "firstname" => $this->getFirstname(),
      "lastname" => $this->getLastname(),
      "username" => $this->getUsername(),
      "email" => $this->getEmail(),
      "password" => $this->getPassword(),
      // "avatar" => $this->getAvatar(),
    ];
  }
}

 ?>
