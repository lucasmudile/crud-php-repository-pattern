
<?php
include_once('../Services/AlunoService.php');
include_once ('../Repositories/alunoRepository.php');
include_once ('../Model/aluno.php');

class StudentControler{


    private $studentService;

    public function __construct(IAlunoService $studentService) {
        $this->studentService = $studentService;
    }

    public function AddStudent(Aluno $aluno)
    {
        $this->studentService->Register($aluno);        
    }

    public function UpdateStudent(Aluno $aluno)
    {
        $this->studentService->Update($aluno);    
    }
    public function GetAllStudents()
    {
        return $this->studentService->GetAll();    
    }
    public function GetStudentById($id)
    {
        return $this->studentService->GetById($id);    
    }
    public function GetStudentByName($name)
    {
        return $this->studentService->GetByName($name);    
    }

    public function DeleteStudent($id)
    {
        $this->studentService->Delete($id);    
    }



}

$alunoRepository = new AlunoRepository();
$serviceStudent = new AlunoService($alunoRepository);
$studentController = new  StudentControler($serviceStudent);

/*
$servi = $student->GetStudentByName("a");

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
echo "</table>";
*/
 
?>