<?php
   include("dbconnect.php");
//error_reporting(0);

   
   if(isset($_POST["login"])) {
      // username and password sent from form 
      
      $myemail =$_POST['email'];
      $mypassword = $_POST['password'];
       
       if (isset($_POST['email'])  && $_POST['password']!=""){
      

      $sql = "SELECT * FROM user WHERE email='{$myemail}' LIMIT 1";
      // print_r($sql);
       
         $result = mysqli_query($db,$sql);
       
       
       if(mysqli_num_rows($result) > 0){
            
       $row = mysqli_fetch_array($result);
           
       if(($row["email"] == $myemail) && $mypassword ==$row["password"]) {
            
                     $_SESSION['login_user'] = $myemail;

                     $_SESSION['userid'] = $row["iduser"];
                      header("location:maim.php");
            
               
      
       }
                   //if(($myemail == "" || empty($myemail)) || ($password == "" || empty($password))){
       // echo "<div style ='text-align:center'>Please fill all fields</div>";
    //}
    else{
                    echo "Invalid Username Or Password";
                  }
       
           
       } // else{
          // echo "Invalid Username Or Password";
      // }
    }
    
        
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      
   }
?>