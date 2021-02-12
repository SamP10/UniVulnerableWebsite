<?php
include 'navBar.php';
?>
<div class="container">
<?php
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==3){
        $module_id=$_POST['module_id'];
        $sql="SELECT * FROM modules WHERE module_id=$module_id";
        $run=mysqli_query($connect, $sql);
        while($row=mysqli_fetch_assoc($run)){
            echo $row['module_name']."<br>";
            $module_leader=$row['module_lead_id'];
            $sql="SELECT * FROM staff WHERE staff_id=$module_leader";
            $result=mysqli_query($connect, $sql);
            while($rows=mysqli_fetch_assoc($result)){
                echo"Module Leader: ".$rows['fname']." ".$rows['sname']."<br>";
                echo"Module Leader Email: ".$rows['email']."<br>";
            }
            echo"Credits for module: ".$row['credits'];
        }
    }elseif ($_SESSION['priv_id']==2){

    }
}
?>
</div>
</body>
</html>
