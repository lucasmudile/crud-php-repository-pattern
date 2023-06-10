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

    <!-- Bootstrap CSS -->
    <link href="../Content/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cadastro</title>
  </head>
  <body>

    <div class="container">
    <br>
    <br>
             
    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Add</button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
      

        foreach($studentController->GetAllStudents() as $student):
            echo "<tr>";
            echo "<td>" .$student->GetId()."</td>";
            echo "<td>" .$student->GetNome()."</td>";
            echo '<td><a href="edit-student.php?id='.$student->getId().'" class="btn btn-outline-secondary">Editar</a></td>';
            echo"<form method='post'>";
             echo "<input type='text' hidden value=".$student->GetId()." name='valorId' class='form-control' id='valorId'>";
            echo '<td><input type="submit" data-bs-toggle="modal"  id="idEstudante" name="idEstudante" data-bs-target="#exampleModal1"  class="btn btn-danger" value="Excluir"></input>';
            echo'</form>';
            echo "</tr>";
        endforeach;
    ?>

  </tbody>
</table>

    </div>

    

 
    <form  method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <label for="exampleFormControlInput1" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" id="nome">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name='salvar' id ='salvar' class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    
    <?php
        if(isset($_POST['salvar']))
        {
          $student = new Aluno();
          $student->SetNome($_POST['nome']);
          $studentController->AddStudent($student);
          echo "<meta http-equiv=\"refresh\" content=\"0;\">";
        }
    ?>

    <?php
            if(isset($_POST['idEstudante']))
            {
              $studentController->DeleteStudent($_POST['valorId']);
              echo "<meta http-equiv=\"refresh\" content=\"0;\">";
            }
?>

<?php
  
echo'
  <form  method="POST">
    <div class="modal fade" id="editarDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <label for="exampleFormControlInput1" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" id="nome">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="editar" id ="editar" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    </form>';



?>

    <script src="../Content/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>