<?php

class dataProvider {
     protected $connection='';
    public function __construct() {
       $host='localhost';
        $user='root';
        $password='';
        $database='questionbank';
        $this->connection= mysqli_connect($host, $user, $password, $database);
     //   mysqli_query('SET CHARACTER SET utf8');
      //  mysqli_query("SET SESSION collation_connection =’utf8_general_ci’");
      
        mysqli_query($this->connection,'SET CHARACTER SET utf8'); 
        mysqli_query($this->connection,"SET SESSION collation_connection ='utf8_general_ci'");
        if(!$this->connection)
            die('Database Not Connct'.mysqli_error($this->connection));  
        
    }
    
    public function get_all_department(){
          $sql="SELECT  * FROM `departments` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in departments';
    }
      
    public function get_all_classes(){
          $sql="SELECT  * FROM `classes` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in classes';
    }
      
    public function get_all_subject(){
          $sql="SELECT  * FROM `subjects` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in subjects';
    }
      
    public function get_all_chapters(){
          $sql="SELECT  * FROM `chapters` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in Subject';
    }
      
    public function getOptionById($id){
          $sql="SELECT  multipleChoise FROM `options` where id=$id ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in option';
    }
    
      
    public function get_maxId_chapters(){
          $sql="SELECT MAX(id)  FROM `chapters` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no Data  in chapters';
    }
    
    public function makeQuestions($courseId){
//        $question="SELECT * from questionssets , questionstable "
//                . "WHERE questionssets.questiontable_fk =questionstable.questionSet_fk "
//                . "and  questionssets.courses_fk  =$courseId and questionstable.courses_fk=$courseId;  ";
//        
        $question="SELECT * from questionssets , questionstable WHERE questionssets.questiontable_fk =questionstable.id and  "
                . "questionstable.questionSet_fk =questionssets.id and questionssets.courses_fk ='$courseId'";
        $result=array();
        $result=$this->getDataByJsonFormate($question);
        $result=json_decode($result,true);
         
       if($result)  
        //   echo '<pre>';
       //print_r($result);
        return $result;   
      
       else   return $result;
    }


//         
//    public function makeQuestions($department, $class, $sub, $chapter){
//        $chapter_fk = $this->genarate_chapter_fk($department, $class, $sub, $chapter);
//                  $sql="SELECT  * FROM `questionssets` , `questionstable`, `options` "
//                          . "where questionssets.chapter_fk=questionstable.chapter_fk";
//
//        $result=array();
//        $result=$this->getDataByJsonFormate($sql);
//        $result=json_decode($result,true);
//         
//       if($result)  
//         
//        return $result;   
//      
//        else   echo 'There is no Data  in chapters';
//    } 
    
//    private function genarate_chapter_fk($department, $class, $sub, $chapter){
//        $sql="SELECT chapters.id FROM `departments`, `chapters`, `courses"
//                . "where departments.id='$department' and chapterNo='$chapter' "
//                . "courses.class_fk ='$class' and courses.subjectName ='$sub'"   ;
//        $result=array();
//        $result=$this->getDataByJsonFormate($sql);
//        $result=json_decode($result,true);
//         
//       if($result)  
//         
//        return $result[0]['id'];   
//      
//        else   echo 'There is no Math  in genarate_chapter_fk';
//    }
//        
    
    public function get_ansFk_by_questableId( $id){
          $sql="SELECT  ans_fk FROM `questionstable` where id=$id ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result[0]['ans_fk'];   
      
        else   echo 'There is no Data  in departments';
    }
    public function get_question_by_questableId( $id){
          $sql="SELECT  question FROM `questionstable` where id=$id ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result[0]['question'];   
      
        else   echo 'There is no Data  in departments';
    }
    public function get_chapterBy_department_fk_class_fk_subject_fk($department_fk,$class_fk,$subject_fk){
          $sql="SELECT  * FROM `chapters` "
                  . "where department_fk=$department_fk and subject_fk=$subject_fk and class_fk=$class_fk ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
         
        return $result;   
      
        else   echo 'There is no data in chapter';
    }
      
            
    
    function getDataByJsonFormate($sql){
        //$sql="SELECT chapters.id FROM `departments`, `chapters`, `courses`";
    // echo "$sql<br>";
    $result = mysqli_query($this->connection, $sql)or die(mysqli_error());
  
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
//        echo '<pre>';
//        print_r($arr);
//          echo '</pre>';
//          die();
	return json_encode($arr);
        
    }
    
    
   
}
