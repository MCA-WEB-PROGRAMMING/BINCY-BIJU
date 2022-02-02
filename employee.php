<html>
<head>
<title>Employment</title>
</head>
<body>
    <form action="" method="POST">
        <center>
            <table border="0" cellpadding="5" cellspacing="5">
                <tr>
                    <td>Enter employee id</td>
                    <td><input type="number" name="emp_id"></td>
                </tr>
                <tr>
                    <td>Enter employee name</td>
                    <td><input type="text" name="emp_name"></td>
                </tr>
                <tr>
                    <td>Enter job name</td>
                    <td><input type="text" name="job_name"></td>
                </tr>
                <tr>
                    <td>Enter manager id</td>
                    <td><input type="number" name="manager_id"></td>
                </tr>
                <tr>
                    <td>Enter salary</td>
                    <td><input type="number" name="salary"></td>
                </tr>
                <tr>
                    <td><center><input type="submit" name="submit" value="submit"></center></td>
                </tr>
            </table>
        </center>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
      $emid=$_POST['emp_id'];
      $emname=$_POST['emp_name'];
      $job=$_POST['job_name'];
      $managerid=$_POST['manager_id'];
      $sal=$_POST['salary'];
      $conn=mysqli_connect("localhost","root","","employee");
      if($conn)
      {
        echo ("successfuly connected");
        echo "<br>";
      }
      else 
      {
        echo ("error");
        echo "<br>";
      }
  $query="INSERT INTO employee_table(emp_id,emp_name,job_name,manager_id,salary) VALUES('{$emid}','{$emname}','{$job}','{$managerid}','{$sal}')";
if(mysqli_query($conn,$query))
{
    echo "successfuly inserted";
    echo "<br>";
}
else 
{
    echo "insertion failed";
    echo "<br>";
}
} 
    ?>
    <?php
if(isset($_POST['submit']))
 {
     $conn=mysqli_connect("localhost","root","","employee");
     ?>
     <table border="1" cellpadding="5" cellspacing="5">
         <tr><th>Employment id</th>
         <th>Employment name</th>
         <th>Job name</th>
         <th>Manager id</th>
         <th>Salary</th></tr>
         <?php
     $search="SELECT * FROM employee_table WHERE salary>35000";
     $res=mysqli_query($conn,$search);
     while($result=mysqli_fetch_assoc($res))
     {
         ?>
        <tr>
        <td><?php echo $result["emp_id"];?></td>
         <td><?php echo $result["emp_name"];?></td>
         <td><?php echo $result["job_name"];?></td>
         <td><?php echo $result["manager_id"];?></td>
        <td><?php echo $result["salary"];?></td>
        </tr>
        <?php

     }
    }

     ?>

    <form method="POST">

</body>
</html>











