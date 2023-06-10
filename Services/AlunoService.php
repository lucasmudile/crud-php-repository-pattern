
<?php

include_once ('IAlunoService.php');
include_once ('../Repositories/alunoRepository.php');


class AlunoService  implements IAlunoService {

    private $alunoRepository;

    public function __construct(IAlunoRepository $alunoRepository) {
        $this->alunoRepository = $alunoRepository;
    }

    
    public function Register(Aluno $aluno)
    {
        try 
        {
            $this->alunoRepository->RegisterAluno($aluno);    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while: " . $e->getMessage();
        }
        
    }

    public function Update(Aluno $aluno)
    {
        try 
        {
             $this->alunoRepository->UpdateAluno($aluno);    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while: " . $e->getMessage();
        }
       
    }
    public function GetAll()
    {
        try 
        {
            return $this->alunoRepository->GetAllAluno();    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while: " . $e->getMessage();
        }

    }
    public function GetById($id)
    {
        try 
        {
            return $this->alunoRepository->GetAlunoById($id);    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }
    public function GetByName($name)
    {
        try 
        {
            return $this->alunoRepository->GetAlunoByName($name);    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try 
        {
             $this->alunoRepository->Delete($id);    
        } 
        catch (Exception $e) 
        {
            echo "An error occurred while: " . $e->getMessage();
        }

    }



}

/*
$alunoRepository = new AlunoRepository();
$alunoService = new AlunoService($alunoRepository);
*/
/*
$aluno = new Aluno();
$aluno->SetNome("Jay Mula");
$aluno->SetId("1");

$alunoService->UpdateAluno($aluno);*/


/*
$aluno1=$alunoService->GetAlunoById(1);
 //$alunoService->GetAllAluno();

echo "<table style='border: 1px black solid;'>";
echo "<thead >";
echo "<th>Nome</th>";
echo "</thead>";
echo "<tbody>";

	echo "<tr>";
	echo "<td>" .$aluno1['name']."<td>";
	echo "</tr>";

echo "</tbody>";
echo "</table>";*/
/*
$servi = $alunoService->GetAlunoByNameService("a");

echo "<table style='border: 1px black solid;'>";
echo "<thead >";
echo "<th>Nome</th>";
echo "</thead>";
echo "<tbody>";

foreach($servi as $aluno):
	echo "<tr>";
	echo "<td>" .$aluno['name']."<td>";
	echo "</tr>";
endforeach;

echo "</tbody>";
echo "</table>";*/

/*
$teste= new AlunoService($alunoRepository);

$aluno = new Aluno();
$aluno->SetNome("Yara Crespo");

var_dump($teste->RegisterAluno($aluno));

*/





?>