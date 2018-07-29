<?php
include './Datalayer/questionDbLayer.php';
include './Datalayer/dataProvider.php';
//include './Datalayer/questionMakerHelper.php';
class Question
{
  
    
    public function addQuestion($request){
          $ques=new questionDbLayer();
          return $ques->addQuestionAll($request);
        
    }
    public function createQuestion($courseId){
        $qus=new dataProvider();
        return $qus->makeQuestions($courseId);
    }
    public function getOptionById($id){
        $qus=new dataProvider();
        $option= $qus->getOptionById($id);
        return $option[0]['multipleChoise'];
    }
    public function addQCourse($request){
        $qus=new questionDbLayer();
        $option= $qus->addQCourse($request);
        return $option;
    }
    public function get_ansFk_by_questableId($id){
         $qus=new dataProvider();
           return $qus->get_ansFk_by_questableId($id);
        
    }
    public function get_question_by_questableId($id){
         $qus=new dataProvider();
           return $qus->get_question_by_questableId($id);
        
    }
    public function get_chapterBy_department_fk_class_fk_subject_fk($department_fk,$class_fk,$subject_fk){
         $qus=new dataProvider();
           return $qus->get_chapterBy_department_fk_class_fk_subject_fk($department_fk,$class_fk,$subject_fk);
        
    }
}
