<?php
class questionDbLayer{
    protected $connection;
    public function __construct() {
       $host='localhost';
        $user='root';
        $password='';
        $database='questionbank';
        $this->connection= mysqli_connect($host, $user, $password, $database);
        
        mysqli_query($this->connection,'SET CHARACTER SET utf8'); 
        mysqli_query($this->connection,"SET SESSION collation_connection ='utf8_general_ci'");
        
        if(!$this->connection)
            die('Database Not Connct'.mysqli_error($this->connection));  
        
    }
    
    public function addQuestionAll($question){
       $course_fk= $this->get_course_fk($question);
        $optionsId=$this->addOption($question);
        $questionTableId= $this->questionTableId();
       $questionSetId= $this->AddQuestionSet($question,$optionsId ,$questionTableId,$course_fk);
      $message= $this->create_question_table($question,$optionsId,$questionSetId,$course_fk);
        return $message;
        
    }
private function create_question_table($question,$optionsId,$questionSetId, $course_fk){
    $sqlForquestionTable="INSERT INTO `questionstable`( `question`, `ans_fk`, `questionSet_fk`, `courses_fk`) "
                . "VALUES ('$question[question]',$optionsId[0],$questionSetId,' $course_fk')";
         if( mysqli_query($this->connection, $sqlForquestionTable))
           return "Succesfully Save";
        else die('Sql Pblm create_question_table'.mysqli_error($this->connection));
}

    private function addOption($options){
       // echo $options['option1'];
         $sqlForOption="INSERT INTO `options`(`multipleChoise`) "
                . "VALUES ('$options[option1]'),"
                . " ('$options[option2]'),"
                . " ('$options[option3]'),"
                . " ('$options[option4]');";
         //echo $sqlForOption;
         //print_r($this->connection);
        if( mysqli_query($this->connection, $sqlForOption))
           return $this->getOptionsId();
        else die('Sql Pblm addOption'.mysqli_error($this->connection));
        
    }
    private function getOptionsId(){
        $sql="SELECT  MAX(Id) FROM `options` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
        //print_r ($result);
        //die ($result[0] ['MAX(Id)']);
      //  $id=$result[0] ['MAX(Id)'];
       if($result)  
       {
           $optionid=array($result[0] ['MAX(Id)']-3,$result[0] ['MAX(Id)']-2,$result[0] ['MAX(Id)']-1,$result[0] ['MAX(Id)']);
        return $optionid;   
       }
        else            echo 'There is no Option in OptionTable';
        
    }
    
    private function AddQuestionSet($question,$optionsId,$questionTableId ,$course_fk){
         $sqlForAddQuestionSet="INSERT INTO `questionssets`( `questiontable_fk`, `option1`, `option2`, `option3`, `option4`, `courses_fk`) "
                . "VALUES ($questionTableId,'$optionsId[0]','$optionsId[1]','$optionsId[2]','$optionsId[3]','$course_fk')";
        
        // die("$sqlForAddQuestionSet");
         if( mysqli_query($this->connection, $sqlForAddQuestionSet))
           return $this->getQuestionId();
        else die('Sql Pblm AddQuestionSet'.mysqli_error($this->connection));
    }
    
        private function getQuestionId(){
        $sql="SELECT  MAX(Id) FROM `questionssets` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
       {
           
        return $result[0] ['MAX(Id)'];   
       }
        else   echo 'There is no Question  in Questionset';
        
    }
    
    private function questionTableId(){
         $sql="SELECT  MAX(Id) FROM `questionstable` ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
         
       if($result)  
       {
           
        return $result[0] ['MAX(Id)']+1;   
       }
        else   echo 'There is no Question  in Questionset';
    }
    
    private function get_course_fk($question){
        $course_id=(string)$question['department_fk'].'-'.(string)$question['class_fk'].'-'.$question['subject_fk'].'-'.(string)$question['chapter_fk'];
       
      
        //die($course_id);
        return $course_id;
    }

    private function mathCourseId($course_fk){
        
            $sql="SELECT  count(id) FROM `courses`  where id ='$course_fk' ";
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
       // print_r();
       if($result[0]['count(id)']>0)  return TRUE;   
      
        else        return FALSE;
    }

        public function addQCourse($request){
          $course_fk= $this->get_course_fk($request);
          if($this->addChapter($request)==FALSE)
            return "THis Course is available Don't need to create it again";
            //$this->addChapter($request);
           // die();
           $sql="INSERT INTO `courses`(`id`, `department_fk`, `class_fk`, `sub_fk`, `chapter_fk`)"
                   . " VALUES ('$course_fk','$request[department_fk]','$request[class_fk]','$request[subject_fk]',"
                   . "'$request[chapter_fk]')";
         if( mysqli_query($this->connection, $sql))
           return "Succesfully Save";
        else die('Sql Pblm create_question_table'.mysqli_error($this->connection));
    
    }
        public function addChapter($request){
         // $course_fk= $this->get_course_fk($request);
          if($this->availableChapter($request))
            return FALSE;
            //$this->addChapter($request);
          
           $sql="INSERT INTO `chapters`( `department_fk`, `class_fk`, `subject_fk`, `chapterNo`,`chapterName`)"
                   . " VALUES ('$request[department_fk]','$request[class_fk]','$request[subject_fk]',"
                   . "'$request[chapterNo]', '$request[chapterName]')";
         if( mysqli_query($this->connection, $sql))
           return  TRUE;
        else die('Sql Pblm create_question_table'.mysqli_error($this->connection));
    
    }
    
        private function availableChapter($request){
        
            $sql="SELECT  count(id) FROM `chapters`  where  department_fk='$request[department_fk]' "
                    . "and  class_fk= '$request[class_fk]' and subject_fk='$request[subject_fk]'"
                    . "and chapterNo='$request[chapterNo]'";
            //die($sql);
        $result=array();
        $result=$this->getDataByJsonFormate($sql);
        $result=json_decode($result,true);
       // print_r();
       if($result[0]['count(id)']>0)  return TRUE;   
      
        else        return FALSE;
    }
    
    
    function getDataByJsonFormate($sql){
    
    $result = mysqli_query($this->connection, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
        
    }
    
}