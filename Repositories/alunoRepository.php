<?php

include_once('../DbContext/Conexao.php');

require_once ('IAlunoRepository.php');

class AlunoRepository implements IAlunoRepository {
  
    public function RegisterAluno(Aluno $aluno)
    {
        $sql = 'INSERT INTO aluno (name) VALUES (?)';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $aluno->GetNome());
		$stmt->execute();

    }

    public function UpdateAluno(Aluno $aluno)
    {
        $sql = 'UPDATE aluno SET name = ? WHERE id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $aluno->GetNome());
        $stmt->bindValue(2, $aluno->GetId());
		$stmt->execute();
           
	}
    
    public function GetAllAluno()
    {
		
		$sql = 'SELECT * FROM aluno order by name';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		$result=array();
		
		    while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){

			   $objecto   =  new Aluno();
			   $objecto->  setId($resultado["id"]);
			   $objecto->  setNome($resultado["name"]);
			   
			   $result[]=$objecto;
			}

			return $result;

    }
    public function GetAlunoById($id)
    {
        $sql = 'SELECT * FROM aluno where id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
		$stmt->execute();

		
		    $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

			   $objecto   =  new Aluno();
			   $objecto->  SetId($resultado["id"]);
			   $objecto->  SetNome($resultado["name"]); 
			   $result=$objecto;
		

			return $result;
    }
    public function GetAlunoByName($name)
    {
        $sql = 'SELECT * FROM aluno where name LIKE :name';

		$stmt = Conexao::getConn()->prepare($sql);

        $search = '%' . $name . '%';
        $stmt->bindParam(':name', $search);

		$stmt->execute();

		$result=array();
		
		    while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){

			   $objecto   =  new Aluno();
			   $objecto->  setId($resultado["id"]);
			   $objecto->  setNome($resultado["name"]);
			   
			   $result[]=$objecto;
			}

			return $result;
    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM aluno WHERE id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
 		$stmt->execute();

    }


}
?>