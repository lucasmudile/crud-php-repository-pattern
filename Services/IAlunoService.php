<?php
include_once('../Model/aluno.php');

interface IAlunoService {
    public function Register(Aluno $aluno);
    public function Update(Aluno $aluno);
    public function GetAll();
    public function GetById($id);
    public function GetByName($name);
    public function Delete($id);
}

?>