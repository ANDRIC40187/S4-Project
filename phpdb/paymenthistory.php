<html>
  <head>
  <style>
     .background{
    position: absolute;
    height:100%;
    width:100%;
    background-image:url("https://img.freepik.com/free-photo/gym-with-barbell-floor-sign-that-says-weight_1340-38220.jpg?t=st=1691574197~exp=1691577797~hmac=b8c7ab3ca8d54b669b9d81f3f6df618d1c91b0cee2971ea302e0ad1d7bc942ed&w=996");
    background-size:cover;
    background-position: center;
    filter: blur(2px);
    z-index: -1;
}
    
table,th,td{
   border:1px solid black;
   background-color: darkturquoise;
}


</style>
  </head>
    <body>
    <div class="background"></div> 
   
    <?php
session_start();
include("connect.php");
$uid=$_SESSION["uid"];
$result = mysqli_query($con,"CALL get_pay_of('$uid')") or die("Select Error");
                if($result){
                  if($result && mysqli_num_rows($result)>0)
                  {
                    echo 
                      "<table><tr><th>PaymentID</th><th>Date</th><th>Amount</th><th>UserID</th><th>GymID</th</tr>";
                    while($user_data = mysqli_fetch_assoc($result)){
                    $pid=$user_data['pid'];
                    $date=$user_data['date'];
                    $amount=$user_data['amount'];
                    $pui=$user_data['uid'];
                    $pgi=$user_data['g_id'];
                    echo "<tr><td>".$pid."</td><td>".$date."</td><td>".$amount."</td><td>".$pui."</td><td>".$pgi."</td></tr>";
                  }
                    echo "</table>";
                  }
                  
               }
?>


    </body>
</html>