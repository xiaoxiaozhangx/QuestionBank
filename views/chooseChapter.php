<?php
$department_fk="";
$class_fk="";
$subject_fk="";
$result=array();
if(isset($_POST['btn'])){
$department_fk=$_POST['department_fk'];
$class_fk=$_POST['class_fk'];
$subject_fk=$_POST['subject_fk'];
//print_r($_POST);
    session_start();
    $_SESSION['examineer']=$_POST['name'];
   $_SESSION['department_fk']=$department_fk;
   $_SESSION['class_fk']=$class_fk;
   $_SESSION['subject_fk']=$subject_fk;
    //die($_SESSION['courseId']);
    include './class/Question.php';
    $chapter= new Question();
    $result=$chapter->get_chapterBy_department_fk_class_fk_subject_fk($department_fk,$class_fk,$subject_fk);
}

   // print_r($result);

?>


<div class="container-fluid">
    <div class="container">
           <h1 class="text-center text-info"> Register Subject</h1>
        <div class="  col-sm-8-12 col-xs-12">
         
            <table class="table table-responsive table-hover table-striped">
                <thead>
                <th  colspan="2" class="text-center text-success">
                    Select Your Chapter for Exam 
                    
                </th>
                </thead>
            <?php foreach ($result as $data){?>
                <tr>
                    <td class="col-sm-10 "><?php echo"Chapter No: ". $data['chapterNo']."  ".$data['chapterName']?></td>
                    <td class="col-sm-2  text-capitalize text-center">
                        <a href="question.php?chapterId=<?php echo $data['id']?>">
                            <button class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
            <?php }?>
            </table>
        </div>
        </div>
        </div>