<?php

// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador
// Abrir sprint2.php con Navegador

class Alumno
{
  private $nombre;
  private $apellido;
  private $tarea;
  public function getNombre(){
    return $this->nombre;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function getTarea(){
    return $this->tarea;
  }
  public function setAlumno($nombre, $apellido, $tarea){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->tarea = $tarea;
  }
}

$LD = new Alumno;
$tarea = "Arreglos generales / Signup/Login validation (JS/PHP) / CSS";
$LD->setAlumno("Lucas","Dantur",$tarea);
$LV = new Alumno;
$tarea = "Arreglos generales / Signup/Login validation (JS/PHP) / CSS";
$LV->setAlumno("Lucas","Villanueva",$tarea);
$MS = new Alumno;
$tarea = "Arreglos generales / Acordeon FAQ / CSS";
$MS->setAlumno("Matias","Sangiorgio",$tarea);
$alumno = "Alumno: ";
$tarea = ". Tareas realizadas: ";
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Sprint 2</title>
   </head>
   <body>
     <h1>Sprint 2</h1>
     <?= $alumno . $LV->getNombre() . " " . $LV->getApellido() . $tarea . $LV->getTarea() ."<br><br>"?>
     <?= $alumno . $MS->getNombre() . " " . $MS->getApellido() . $tarea . $MS->getTarea() ."<br><br>"?>
     <?= $alumno . $LD->getNombre() . " " . $LD->getApellido() . $tarea . $LD->getTarea() ."<br><br>"?>

     <br><br>
    <p>En este sprint hicimos la seccion de preguntas frecuentes (FAQ) con un modelo acordeon por JS, la validacion del signup/login (JS) y signup (PHP). </p>
    <p>Se hicieron diversas correcciones al CSS, en especial en relacion al footer y al responsive.</p>
    <p>Se creo una sección forgot.php para recuperar la contraseña.</p>
    <p>Se agregó una base de datos "usuarios.json", se implementó el contador de Digitalhouse y se hizo que cuando se registre un usuario se incremente el mismo. Esto se hizo por PHP porque pasamos por alto que en la consigna pedia hacer las consultas por AJAX. </p>




   </body>
 </html>
