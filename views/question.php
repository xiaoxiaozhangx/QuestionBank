<?php
require_once './class/Question.php';
//require_once './Datalayer/global.php';
$questionSet=array();
$count=1;
$obj=new Question();

 // echo '<pre>';
//print_r($_SESSION['questionarray']);
//echo '</pre>';
 // print_r($questions);

//   $input=array(1,6,7,8,9,0,2,3,4,5);
//   $output = array_slice($input, 0, 7); 
// echo '<pre>';
//print_r($output);
//echo '</pre>';  
   if($_GET['chapterId']){
       session_start();
       
         $id=(string)$_SESSION['department_fk'].'-'.(string)$_SESSION['class_fk'].'-'.$_SESSION['subject_fk'].'-'.$_GET['chapterId'];

       // $_SESSION['courseId']=$_SESSION['courseId'].;
         //       $_SESSION['courseId']=NULL;
      //  die($id);
       $questions=$obj->createQuestion($id);
   shuffle($questions);
  //$_SESSION['questionarray']=$questions['questiontable_fk'];
   if(sizeof($questions)>50)
     $questions=array_slice($questions, 0, 50); 

   }
 
?>

<div class="container-fluid">
    <div class="container">
        <div class="  col-sm-10 col-xs-12">
            
            <form method="post" action="ansScript.php">
  <fieldset class="form-group ">
      
<?php foreach ($questions as $ques){
//     shuffle($ques);
  //   print_r($ques);
    ?>      
     
      <lebel class="col-sm-12 text-primary"  style="font-size: 20px;">
      <b>     <?php echo '|'.$count.'| '; echo $ques['question'];?>
          <?php   $questionSet[$count++]=$ques['questiontable_fk'];?></b>
      </lebel>
      <?php $optionsId=array($ques['option1'],$ques['option2'],$ques['option3'],$ques['option4']);
      shuffle($optionsId);
    //  echo '<pre>';
      //print_r($optionsId);
     
      ?>
  <div class="form-check ">
<label class="form-check-label">
      <input class="form-check-input hidden" type="radio" name="<?php echo $ques['questiontable_fk']; ?>"  value="" checked > 
  </label>
</div>
      <div class="form-check form-check radio" style="color:#000;">
          <div class="col-sm-offset-1 col-sm-11">
  <label class="form-check-label">
      <input class="form-check-input" type="radio" name="<?php echo $ques['questiontable_fk']; ?>"  value="<?php echo $optionsId[0]; ?>" >
      <?php echo $obj->getOptionById($optionsId[0]); ?><br>
      <input class="form-check-input" type="radio" name="<?php echo $ques['questiontable_fk']; ?>"  value="<?php echo $optionsId[1]; ?>" >
      <?php echo $obj->getOptionById($optionsId[1]);?><br>
      <input class="form-check-input" type="radio" name="<?php echo $ques['questiontable_fk']; ?>"  value="<?php echo $optionsId[2]; ?>" >
            <?php echo $obj->getOptionById($optionsId[2]); ?><br>
      <input class="form-check-input" type="radio" name="<?php echo $ques['questiontable_fk']; ?>"  value="<?php echo $optionsId[3]; ?>" >
      <?php echo $obj->getOptionById($optionsId[3]); ?>
  </label>
</div>
      </div>
      
<?php }?>
      <input class="form-check-input hidden" type="radio" name="questionSet"  
             value="<?php echo htmlentities(serialize($questionSet))?>" checked > 

  </fieldset>
    
    
    <div class="col-sm-12 row"></div>
    
  <div class="form-group row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-danger pull-left" name="cancle">Cancle</button>
        <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
    </div>
  </div>
</form>
            
        </div>
          
        <div class="col-sm-2" >
        
        
            <p id="demo" class="h3"></p>
        
    </div>
    </div>
  
</div>

<script>




//timer
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
