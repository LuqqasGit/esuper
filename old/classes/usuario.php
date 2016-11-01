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

  public function __construct($id, $firstname, $lastname, $email, $username, $password, $avatar) {
    $this->id = $id;
    $this->firstname =$firstname;
    $this->lastname =$lastname;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    $this->avatar = $avatar;
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

  public function getAvatar(){
    $name = "img/" . $this->getId();
    $matching = glob($name . ".*");
    if (!empty($matching)) {
      $info = pathinfo($matching[0]);
      $ext = $info['extension'];
      return $name . "." . $ext;
    }
    return "img/default.jpg";
  }

  public function setAvatar($avatar) {
    if ($avatar["error"] == UPLOAD_ERR_OK) {

      $path = "img/";

      if (!is_dir($path)) {
        mkdir($path, 0777);
      }

      $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

      if (strtolower($ext) == "jpg" || strtolower($ext) == "jpeg" || strtolower($ext) == "png") {
        move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
        $this->avatar = $this->getId() . "." . $ext;
        // traer usuario, cambiar $usuario['avatar'] y volverlo a guardar en el JSON
        return true;
      }
      return false;
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
      "avatar" => $this->getAvatar(),
    ];
  }
}

 ?>
