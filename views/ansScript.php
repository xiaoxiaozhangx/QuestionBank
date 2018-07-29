<?php
include './class/Question.php';
$number=0;   $count=0;
$ansscript= new Question();

   if(isset($_POST['cancle'])) header('Location: index.php');
$questionSet=array();
$examPaper=array();
    if(isset($_POST['submit'])) {
         //echo '<pre>';
        $examPaper=$_POST;
         $questionSet = unserialize($_POST['questionSet']);
         
   }
?>

<div class="container-fluid">
    <div class="container">
                <div class="col-sm-10">
                    <h1 class="text-center">ANS SHEET</h1>

<?php foreach ($questionSet as $ques){ 
          $count=$count+1;

    ?>  
        <?php  if($examPaper[(string)$questionSet[$count]]==$ansscript->get_ansFk_by_questableId($questionSet[$count]))   
         {
           $number++; ?>
        <div class="col-sm-12 row" style="padding-bottom: 10px;">

            <b> <lebel class="col-sm-12 text-primary" style="  font-size: 20px;" >
         <?php echo "|$count| ". $ansscript->get_question_by_questableId($questionSet[$count]) ?><br>
                </lebel></b>
            <lebel class="col-sm-12 text-success " >
                <span class="text-success fa-2x"><i class="fa fa-check" aria-hidden="true"></i></i></span>
                  <?php echo $ansscript->getOptionById((string) $examPaper[$questionSet[$count]]); ?>
 
         
      </lebel>
    </div>
         <?php }
         else 
         { ?>
    <div class="col-sm-12  row  "    style="padding-bottom: 10px;">
        <b>
      <lebel class="col-sm-12 text-primary "   style="  font-size: 20px;" >
         <?php echo "|$count| ". $ansscript->get_question_by_questableId($questionSet[$count])  ?><br>
      </lebel></b>
      <lebel class="col-sm-12 text-danger " >
                          <span class="text-danger fa-2x"><i class="fa fa-times" aria-hidden="true"></i></i></span>
                  <?php    if($examPaper[(string)$questionSet[$count]]) {echo $ansscript->getOptionById((string) $examPaper[$questionSet[$count]]); 
                  }else echo '<br>';
               
            ?>
         
      </lebel>
      <lebel class="col-sm-12   text-success  text-success" >
          <b >Correct Ans:</b>  <?php echo $ansscript->getOptionById($ansscript->get_ansFk_by_questableId($questionSet[$count])); ?>
 
         
      </lebel>
    </div>
        
        
        
         <?php }
         

         ?> 
                    <!--<div class="col-sm-12 row"  style="padding-bottom: 10px;">  </div>--> 
       
       
       
       <?php  }?>
       
        
        
        </div>

        <div class="col-sm-2" style="font-size: 18px" >
            <b> You got  <?php echo $number;?> out Of  <?php echo sizeof($questionSet);?></b>

    </div>
    </div>
  
</div>



