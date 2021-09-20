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




$id        = $_POST['id'];
      $itm_type  = $_POST['itm_type'];
      $itm_det    = $_POST['itm_det'];
      $itm_pri    = $_POST['itm_pri'];
      $Hand_ov_to  = $_POST['Hand_ov_to'];                 
      $pdate       = $_POST['pdate'];         
      $Itm_code    = $_POST['Itm_code'];
      $Proj       = $_POST['Proj'];
      $Acode      = $_POST['Acode'];         
      $Condtn     = $_POST['Condtn']; 
      $itm_invc   = $_POST['itm_invc'];       
      $Othr1      = $_POST['Othr1'];
      $Othr2  = $_POST['Othr2'];



      $sql = "INSERT INTO details (id,itm_type,itm_det,itm_pri,Hand_ov_to,pdate,Itm_code,Proj,Acode,Condtn,photo,itm_invc,Othr1,Othr2) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$id,$itm_type,$itm_det,$itm_pri,$Hand_ov_to,$pdate,$Itm_code,$Proj,$Acode,$Condtn,$finalimg,$itm_invc,$Othr1,$Othr2]);
     if($result){

     echo 'Successfully saved.';
    }else{
      echo 'There were erros while saving the data.';
    }
}else{
  echo 'No data';
}
    ?>


           <h1> Inventory System </h1>
         <br><br><br>
         <form action="index.php" method="post" enctype="multipart/form-data">
          <div class="outerbox">

          
           <div class="ficon">
        <i class="fa fa-clipboard" aria-hidden="true"></i>
           </div>

           <div class="fouterbox">
           <div class="main"> 

              <div class="left">
                <input type="text"name="id" placeholder="ID">
                 <input type="text"name="itm_type" placeholder="Itemtype" required>
                 <input type="text"name="itm_det" placeholder="ItemDetail" required>
                 <input type="text"name="itm_pri" placeholder="ItemPrice" required>
                  <input type="text"name="Hand_ov_to" placeholder="Handedoverto" required>
                   <input type="text"name="pdate" placeholder="PurchaseDate" required>
                   <input type="text"name="Itm_code" placeholder="ItemCode" required>
                   <input type="text"name="Proj" placeholder="Project" required>

                <input type="text"name="Acode"placeholder="AssetCode" required> 
                <input type="text"name="Condtn" placeholder="Condition" required>
                 


              </div>
             <div class="right">
               
               
                    <hr/>
                    <div class="form-group">
                      <label>uploadinventoryphoto1</label><br>
                      <input name="photo[]" type="file"  class="form-control" multiple/><br>
                      <label>Item Invoice</label><br>
                       <input name="photo[]" type="file"  class="form-control" multiple/><br>
                       <label>Other 1</label><br>
                       <input name="photo[]" type="file"  class="form-control" multiple/><br>
                       <label>Other 2</label><br>
                       <input name="photo[]" type="file"  class="form-control" multiple/><br><br>

                     
                      
                      
                     
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