<html>
   <head>
   <style>
      table,th,td{
         border:3px solid white;
         height: 2cm;
  width: 11cm;
  background-color: black;
  color :red;
      }
      .background{
    position:absolute;
    height:100%;
    width:100%;
    background-image:url("https://img.freepik.com/free-photo/gym-with-barbell-floor-sign-that-says-weight_1340-38220.jpg?t=st=1691574197~exp=1691577797~hmac=b8c7ab3ca8d54b669b9d81f3f6df618d1c91b0cee2971ea302e0ad1d7bc942ed&w=996");
    background-size:cover;
    background-position: center;
    z-index: -1;
}

      </style>
     </head> 
   <body>
   <div class="background"></div>
   <form action="home1.php"method="post">
      <?php 
session_start();
         include("connect.php");
         if(isset($_POST['logout'])){
            echo "logged out";
            header("location:index.html");
         }
         $uid=$_SESSION["uid"];
         if(isset($_POST['profile'])){
            
            
            $result = mysqli_query($con,"SELECT * FROM user WHERE userid='$uid'") or die("Select Error");
                if($result){
                  if($result && mysqli_num_rows($result)>0)
                  {
                     echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>TrainerID</th><th>Password</th></tr>";
                    while($user_data = mysqli_fetch_assoc($result)){
                    $p=$user_data['password'];
                    $un=$user_data['uname'];
                    $e=$user_data['email'];
                    $uph=$user_data['uph_no'];
                    $uti=$user_data['u_trainer_id'];
                    echo "<tr><td>".$uid."</td><td>".$un."</td><td>".$e."</td><td>".$uph."</td><td>".$uti."</td><td>".$p."</td></tr>";
                    echo "</table>";}
               }
                  
                }
               }
               if(isset($_POST['trainer'])){
                  $_SESSION["uid"]=$uid;
                  header("location:trainer.php");
               }
               if(isset($_POST['edit'])){
                  $_SESSION["uid"]=$uid;
                  $_SESSION["un"]=$un;
                  header("location:edit.php");
               }
               if(isset($_POST['pay'])){
                  $_SESSION["uid"]=$uid;
                  header("location:payment.php");
            }
               
         
         ?>
         <input class="block" type="submit" name="edit" value="EDIT">
         </body>
         </html>