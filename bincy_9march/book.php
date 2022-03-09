<html>
<head><title>book</title>
</head>
<body bgcolor="pink">
<form action="" method="POST">
    <center>
<table border="0" cellpadding="5" cellspacing="5">
    <tr>
        <td>Enter the Accession no</td>
        <td><input type="text" name="accno"></td>
    </tr>
    <tr>
        <td>Enter the title</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>Enter author</td>
        <td><input type="text" name="author"></td>
    </tr>
    <tr>
        <td>Enter publisher name</td>
        <td><input type="text" name="publisher"></td>
    </tr>
    <tr>
    <td><center><input type="submit" name="submit" value="submit"></center></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
    $accno=$_POST['accno'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];
    $conn=mysqli_connect("localhost","root","","book_table");
    if($conn)
    {
        echo("sucessfully connected");
        echo "<br>";
    }
    else
    {
       echo("error");
       echo"<br>";
    }
    $query="INSERT INTO book(accno,title,author,publisher) VALUES('{$accno}','{$title}','{$author}','{$publisher}')";
if(mysqli_query($conn,$query))
{
    echo("Sucessfully inserted");
    echo"<br>";
}
else
{
 echo("inserton failed");
 echo"<br>";
}

}
 
?>
<form method="POST">
 <br>
 <br>
 Enter the title of the book to be searched<input type="text" name="title1">
 <input type="submit" name="submit1" value="submit">
 </form> 
 <?php
 if(isset($_POST['submit1']))
 {
     $title=$_POST['title1'];
     $conn=mysqli_connect("localhost","root","","book_table");
     ?>
     <table border="1" cellpadding="5" cellspacing="5">
         <tr><th>Accesssionnumber</th>
         <th>Title</th>
         <th>Author</th>
         <th>Publisher</th></tr>
         <?php
     $search="SELECT * FROM book WHERE title='{$title}'";
     $res=mysqli_query($conn,$search);
     while($result=mysqli_fetch_assoc($res))
     {
         ?>
        <tr>
        <td><?php echo $result["accno"];?></td>
         <td><?php echo $result["title"];?></td>
         <td><?php echo $result["author"];?></td>
        <td><?php echo $result["publisher"];?></td>
        </tr>
        <?php

     }
    }

     ?>
</center>
</body>
</html>


