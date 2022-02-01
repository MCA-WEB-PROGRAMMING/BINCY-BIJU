<html>
<head><title>book</title>
</head>
<body>
<form action="" method="POST">
    <center>
<table border="0" cellpadding="5" cellspacing="5">
    <tr>
        <td>Enter the Accession no</td>
        <td><input type="text" name="accessionno"></td>
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
        <td>Enter edition</td>
        <td><input type="text" name="edition"></td>
    </tr>
    <tr>
        <td>Enter publication</td>
        <td><input type="text" name="publications"></td>
    </tr>
    <tr>
    <td><center><input type="submit" name="submit" value="submit"></center></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
    $accno=$_POST['accessionno'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $edition=$_POST['edition'];
    $publication=$_POST['publications'];
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
    $query="INSERT INTO book(accessionno,title,author,edition,publications) VALUES('{$accno}','{$title}','{$author}','{$edition}','{$publication}')";
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
         <th>Edition</th>
         <th>Publications</th></tr>
         <?php
     $search="SELECT * FROM book WHERE title='{$title}'";
     $res=mysqli_query($conn,$search);
     while($result=mysqli_fetch_assoc($res))
     {
         ?>
        <tr>
        <td><?php echo $result["accessionno"];?></td>
         <td><?php echo $result["title"];?></td>
         <td><?php echo $result["author"];?></td>
         <td><?php echo $result["edition"];?></td>
        <td><?php echo $result["publications"];?></td>
        </tr>
        <?php

     }
    }

     ?>
</center>
</body>
</html>
