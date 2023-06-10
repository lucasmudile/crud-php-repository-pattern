<?php


class Aluno{

    private $id;
    private $name;

    public function SetId($id){$this->id = $id;}
    public function GetId(){return $this->id;}

    public function SetNome($name){$this->name = $name;}
    public function GetNome(){return $this->name;}
}

?>