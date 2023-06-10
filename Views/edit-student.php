<?php 

include_once('../Controllers/controllerStudent.php'); 
include_once('../Model/aluno.php'); 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../Content/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cadastro</title>
  </head>
  <body>

    <div class="container">
    <br>
    <br>
    

    <?php
    $id = $_GET['id'];
    if(isset($id))
    {
      $student = $studentController->GetStudentById($id);
      echo'
      <form method="POST">
      <input type="text" name="idStudent" hidden class="form-control" id="idStudent" value="'.$student->GetId().'">
              <label for="exampleFormControlInput1" class="form-label">Nome</label>
              <input type="text" name="nomeStudent" class="form-control"  id="nomeStudent" value="'.$student->GetNome().'"/>
              <br>
              <button type="submit" name="editar" id ="editar" class="btn btn-primary">Editar</button>
              <a href="student.php" class="btn btn-outline-secondary">Voltar</a>
        </form>';
    }

    if(isset($_POST['editar']))
    {
        $aluno = new Aluno();
        $aluno->SetId($_POST['idStudent']);
        $aluno->SetNome($_POST['nomeStudent']);

        $studentController->UpdateStudent($aluno);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost:8080/crud-pdo-repositoryPattern/Views/student.php\">";
        
    }
?>
    </div>
    <script src="../Content/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>