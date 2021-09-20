<?php
require_once('config.php');
?>

<html>  
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-compatible" content=IE="edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <head>      
       <link rel="stylesheet" type="text/css" href"css/bootstrap.min.css">
        <link rel ="stylesheet" type="text/css" href="style.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
      
     </head>
     <body>  

   <?php
   if (isset($_POST['submit'])) {

      $extension=array('jpeg','jpg','png','gif');
      $finalimg='';
      foreach ($_FILES['myfile']['tmp_name'] as $key => $value) {
        $filename=$_FILES['myfile']['name'][$key];
       $filename_tmp=$_FILES['myfile']['tmp_name'][$key];
       echo '<br>';
       $ext=pathinfo($filename,PATHINFO_EXTENSION);
      
        if(in_array($ext,$extension))
        {
           IF(!file_exists('uploads/'.$filename))
           {
          move_uploaded_file($filename_tmp,'uploads/'.$filename);
           //$finalimg=$filename;
          $finalimg .=$filename .',';
            }else{
                
                     $filename=str_replace('.','-',basename($filename,$ext));
                     echo $newfilename=$filename.time().".".$ext;
                     move_uploaded_file($filename_tmp, 'uploads/'.$newfilename);
                     //$finalimg=$newfilename;
                     $finalimg .=$newfilename .',';
                 }
        }else
        {
          //display error
        }
     }





      $id = $_POST['id'];
      $empid = $_POST['empid'];
      $attenid = $_POST['attenid'];
      $name = $_POST['name'];
      $fname = $_POST['fname'];
      $dob = $_POST['dob'];
      $gender =$_POST['gender'];                 
      $mstatus = $_POST['mstatus'];         
      $religion = $_POST['religion'];
      $domicile = $_POST['domicile'];
      $taddress = $_POST['taddress'];         
      $paddress = $_POST['paddress'];        
      $cnic = $_POST['cnic'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $mobile = $_POST['mobile'];
      $designation = $_POST['designation'];
      $qualification = $_POST['qualification'];
      $nextofkin = $_POST['nextofkin'];
      $jobhistory = $_POST['jobhistory'];
      $qualificationid =$_POST['qualificationid'];
      



     $sql = "INSERT INTO record (id,empid,attenid,name,fname,dob,gender,mstatus,religion,domicile,taddress,paddress,cnic,email,phone,mobile,designation,qualification,nextofkin,jobhistory,qualificationid,myfile,image) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$id,$empid,$attenid,$name,$fname,$dob,$gender,$mstatus,$religion,$domicile,$taddress,$paddress,$cnic,$email,$phone,$mobile,$designation,$qualification,$nextofkin,$jobhistory,$qualificationid,$finalimg]);
     if($result){

     echo 'Successfully saved.';
    }else{
      echo 'There were erros while saving the data.';
    }
}else{
  echo 'No data';
}
    ?>
    


           <h1>User Registration</h1>
         <br><br><br>
         <form action="index.php" method="post">
          <div class="outerbox">

          
           <div class="ficon">
             <i class="fa fa-user-circle-o" arial-hidden="true"></i>
           </div>

           <div class="fouterbox">
           <div class="main"> 

              <div class="left">
                <input type="text" name="id" placeholder="id" required>
                <input type="text"name="empid" placeholder="Employee ID" required>
                 <input type="text"name="attenid" placeholder="Atten ID" required>
                 <input type="text"name="name" placeholder="Name" required>
                 <input type="text"name="fname" placeholder="FatherName" required>
                 <input type="text"name="dob" placeholder="DateofBirth" required=>
                   <input type="radio" name="gender" id="gender"required>Male
                  <input type="radio" name="gender" id="gender" required>Female<br>
                  <input type="text"name="mstatus" placeholder="MartialStatus" required>
                 <input type="text"name="religion" placeholder="Religion" required>
                 <input type="text"name="domicile" placeholder="Domicile" required>
                  <input type="text"name="cnic" placeholder="CNIC" required>
                


              </div>
             <div class="right">
                 <input type="text"name="email" placeholder="Email" required>
                <input type="text"name="phone" placeholder="Phone" required>
                <input type="text"name="mobile"placeholder="Mobile" required> 
                <input type="text"name="designation" placeholder="Designation" required>
                <input type="text"name="qualification"placeholder="Qualification" required>
                <input type="text"name="nextofkin" placeholder="Next of KIN iD" required>
                <input type="text"name="jobhistory"placeholder="Job History ID" required>
                <input type="text"name="qualificationid"placeholder="Qualification ID" required>  
                <input type="text"name="taddress" placeholder="Temporary Address" required>
                <input type="text"name="paddress" placeholder="Permanent Address" required>
                <input type="file"name="myfile" placeholder="myfile[]" multiple="multiple" required><br><br>
                <input type="file"name="image" multiple="multiple" required>
                <input class="btn-primary" type="submit" name="submit" value="submit">
             
                
                

             </div>

         </div>
     </div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
$(function(){
    $('#register').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){


      var id         = $('#id').val();
      var empid      = $('#empid').val();
      var attenid    = $('#attenid').val();
      var name       = $('#name').val();
      var fname      = $('#fname').val();
      var dob        = $('#dob').val();
      var gender     = $('#gender ').val();
      var mstatus    = $('#mstatus').val();
      var religion   = $('#religion').val();
      var domicile   = $('#domicile').val();
      var taddress   = $('#taddress ').val();
      var paddress   = $('#paddress').val();
      var cnic       = $('#cnic').val();
      var phone      = $('#phone').val();
      var mobile     = $('#mobile').val();
      var designation  = $('#designation ').val();
      var qualification   = $('#qualification').val();
      var nextofkin   = $('#nextofkin').val();
      var jobhistory  = $('#jobhistory ').val();
      var qualificationid   = $('#qualificationid').val();
      var myfile =$('#myfile').val();
      var image =$('image').val();


        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'index.php',
          data: {id: id,empid: empid,attenid: attenid,name: name,fname: fname,dob: dob,gender: gender,mstatus: mstatus,religion: religion,domicile: domicile,taddress: taddress,paddress: paddress,cnic: cnic,email: email,phone: phone,mobile: mobile,designation: designation,qualification: qualification,nextofkin: nextofkin,jobhistory: jobhistory,qualificationid: qualificationid, myfile: myfile, image: image},
          success: function(data){
          Swal.fire({
                'title': 'Successful',
                'text': data,
                'type': 'success'
                })

          },
          error: function(data){
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
                })
          }
        });


      }else{

      }


    });


  });

</script>
</body>
</html>