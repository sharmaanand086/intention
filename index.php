 <?php
// $id;
// if($_COOKIE["userid"])
// {
//     $id=$_COOKIE["userid"];
// }
// else{
$id = rand(10,10000);
// $cookie_name = "userid";
// $cookie_value = $id;
// //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
// }

?>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="css/intension.css">
 <link rel="stylesheet" href="css/responsive.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<style>
     .control-label:after {
  content:"*";color:red;
}
    .control-label1:before {
  content:"*";color:red;
}
@media (min-width:320px) and (max-width:560px){
    .mycontainer{
        top:20%;
    }
        
    }
}

</style>
</head>
<body><div class="abcd">
    <p class="ak">Arfeen khan</p>
    <div class="container">
      <div class="mycontainer">  
     
        <h1 class="form_heading">COACH TO A FORTUNE </h1>
        
         <div class="form_container">
       <h6 class="control-label1" style="color:red; font-family:Barlow-Medium;"> Required</h6>
        <form method="post" action="insertquestion.php">
        <input type="hidden" id="id" value="<?php echo $id ?>" name="id">
       <?php $con = mysqli_connect("localhost","username","password","dbname");
       $check ="SELECT * FROM `qintension`";
       $rs = mysqli_query($con,$check);
       $a=1;
       while($row= mysqli_fetch_assoc($rs)){
        
       ?>
       <div class="form-group required"><label class="col-md-12 control-label"><?php echo $row["questions"]; ?> </label>
           <div class="col-md-12">
           <input class="form-control" required="required"  id="<?php echo $a; ?>" type="text" name="answers[]" required />
           </div>
        </div>
       
       <?php $a++; }?>
       <input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">
        </form>
        </div>
        </div>
    </div>
</div>
 </body>
  <script>
//   $('#3').change(function()
//  {
//      //alert('dsaf');
//      var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//       var email= document.getElementById('3').value;
//       if (reg.test(email.value) == false) 
//         {
//             alert('Invalid Email Address');
//             return false;
//         }

//         return true;
     
//  });
  </script>
 </html>
