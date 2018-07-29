
<?php
require_once './class/Question.php';
require_once './Datalayer/dataProvider.php';
$message="";
if(isset($_POST['btn'])){
    $insert= new Question();
    $message=$insert->addQuestion($_POST);   
}
$data=new dataProvider();
$subjet=$data->get_all_subject();
$chapter=$data->get_all_chapters();
$class=$data->get_all_classes();
$department=$data->get_all_department();
?>
<div class="container-fluid">
    <div class="container">
        <div class="col-sm-offset-2  col-sm-8 col-xs-12">
            <h1 class="text-center text-info"> Create Question</h1>
                    <h4 class="text-info text-center"> <?php echo $message;?></h4>

      
            <form method="post">
<div class="form-group">
    <textarea  class="form-control" name="question" placeholder="Enter Question" required></textarea>
   
  </div>
        
        
 <div class="form-group ">
     <input type="text" class="form-control " name="option1" placeholder="Enter Correct Ans" required>
   
  </div>
  <div class="form-group">
      <input type="text" class="form-control" name="option2" placeholder="Options 2" required>
   
  </div>
  
  <div class="form-group">
      <input type="text" class="form-control" name="option3" placeholder="Options 3" required>
   
  </div>
 
  <div class="form-group">
      <input type="text" class="form-control" name="option4" placeholder="Options 4" required>
   
  </div>
        
        <div class="col-sm-3">
               <div class="row">
            <lebel class="col-sm-12 text-center"> Department</lebel>
            <select  class="form-control"  name="department_fk" >
                <?php
                foreach ($department as $dept){?>
               
                <option value="<?php echo $dept['id']?>"><?php echo $dept['departmentName']?></option>
                     
               <?php }    ?>
            
    </select>
        </div>      
        </div>
        
        <div class="col-sm-3">
               <div class="row">
            <lebel class="col-sm-12 text-center">Class</lebel>
            <select  class="form-control" name="class_fk" >
        <?php
                foreach ($class as $cls){?>
               
                <option value="<?php echo $cls['id']?>"><?php echo $cls['className']?></option>
                     
               <?php }    ?>
            
    </select>
        </div>      
        </div>
        
        <div class="col-sm-3">
               <div class="row">
            <lebel class="col-sm-12 text-center"> Subject</lebel>
            <select  class="form-control"  name="subject_fk">
                 <?php
                foreach ($subjet as $sub){?>
               
                <option value="<?php echo $sub['id']?>"><?php echo $sub['Sub']?></option>
                     
               <?php }    ?>
    </select>
        </div>      
        </div>
        
        <div class="col-sm-3">
               <div class="row">
            <lebel class="col-sm-12 text-center" >Chapter</lebel>
            <select  class="form-control " name="chapter_fk" >
  
                
                
                <?php
                foreach ($chapter as $chp){?>
               
                <option value="<?php echo $chp['id']?>"><?php echo $chp['chapterName']?></option>
                     
               <?php }    ?>
            
    </select>
        </div>      
        </div>
        
                <button type="submit" class="btn btn-primary col-sm-12  " name="btn">Create Question</button>
</form>
  </div>
        
        <div class="col-sm-2 " >

        
    </div>
    </div>
  
</div>