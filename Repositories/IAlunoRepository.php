
<?php
include_once('../Model/aluno.php');

interface IAlunoRepository {
    public function RegisterAluno(Aluno $aluno);
    public function UpdateAluno(Aluno $aluno);
    public function GetAllAluno();
    public function GetAlunoById($id);
    public function GetAlunoByName($name);
    public function Delete($id);
}

?>