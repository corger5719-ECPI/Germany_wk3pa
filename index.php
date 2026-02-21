<?php
//Connect to Database
$hostname = "localhost";
$username = "ecpi_user";
$password = "Password1";
$dbname = "Germany_wk3pa";
$conn = mysqli_connect($hostname, $username, $password, $dbname);



//Establish variables to support add/update/delete
$fullname = -1;
$birth = "";
$color = "";
$visit = "";
$nickname = "";

//Variables to determine the type of operation
$add = false;
$update = false;
$delete = false;
?>


<html>
<head>
    <title>Cora Germany's Week 3 Performance Assessment</title>
</head>

<body>

<style>
    table {
        border-spacing: 5px;
    }
    table, th,  td {
border: 1 px solid black;
border-collapse: collapse;
}


th, td {
    padding: 15px;
    text-align: center;
}
th{
    background-color:lightskyblue;
}

tr:nth-child(even) {
    background-color:whitesmoke;
}
tr:nth-child(odd) {
    background-color:lightgray;
    }
</style>
<html>
    <head>
    <title>Week3 Midterm - Cora Germany</title>
    ____
    </head>

<body>



<form method="POST">
    <h3>Enter your name: <input type"text" name="fullname"></h3>
    <h3>Enter your birthdate: <input type"text" name="birth"></h3>
     <h3>Enter your favorite color: <input type"text" name="color"></h3>
    <h3>Enter your favorite place to visit: <input type"text" name="visit"></h3>
    <h3>Enter your nickname: <input type"text" name="nickname"></h3>
    <input type="submit" name="add" value="Add">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete"
</form>

<?php
//Declare and clear variables for display
$fullname = '';
$birth = '';
$color = '';
$visit = '';
$nickname = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


if (isset($_POST['fullname'])) 
    $fullname = $_POST['fullname'];
      
if (isset($_POST['birth'])) 
    $birth = $_POST['birth'];
    
if (isset($_POST['color']))
            $color = $_POST['color'];
       
if (isset($_POST['visit'])) 
    $visit = $_POST['visit'];
    
if (isset($_POST['nickname'])) 
   $nickname = $_POST['nickname'];

   $add = isset($_POST['add']);
   $delete = isset($_POST['delete']);
   $update = isset($_POST['update']);
  


if (strlen($fullname) >0 )
           echo "<h3> The name you entered is: $fullname </h3>";
    else
        echo "<h3> You didn't enter your name! </h3>";


        if (strlen($birth) > 0 )
              echo "<h3> The birthdate you gave is: $birth </h3>";
    else
        echo "<h3> You didn't enter your birthdate!</h3>";
        

if (strlen($color) > 0)
            echo "<h3> You said your favorite color is  $color </h3>";
    else
        echo "<h3> You didn't enter a favorite color! </h3>";

if (strlen($visit) > 0 )
        echo "<h3> You said your favorite place is: $visit </h3>";
    else
        echo "<h3> You didn't enter a favorite place! </h3>";


   if (strlen($nickname) > 0)
        echo "<h3> You said your nickname is: $nickname </h3>";
    else
    
        echo "<h3> You didn't enter a nickname! </h3>";
}  
if ($add) {
    //Need to add a new user
    $fullname = $_POST['fullname'] ?? '';
    $birth = $_POST['birth'] ?? '';
    $color = $_POST['color'] ?? '';
    $visit = $_POST['visit'] ?? '';
    $nickname = $_POST['nickname'] ?? '';
   

    $addQuery = "INSERT INTO
        userinfo (fullname, birth, color, visit, nickname)
        VALUES ('$fullname', '$birth', '$color', '$visit', '$nickname')";
    mysqli_query($conn, $addQuery);
    
    if ($delete) {
        $sql = "DELETE FROM fullname WHERE fullname='$fullname'";
        mysqli_query($conn, $sql);
    }

    //Clear the fields
  
    $fullname = '';
    $birth = '';
    $color = '';
    $visit = '';
    $nickname = '';
}

else if ($update) {
    //Updated values submitted
    $fullname = $_POST['fullname']; 
    $birth = $_POST['birth'];
    $color = $_POST['color'];
    $visit = $_POST['visit'];
    $nickname = $_POST['nickname'];
}

    $updQuery = "UPDATE fullname SET{
        fullname= '$fullname', birth = '$birth',
        color = '$color', visit = '$visit',
      nickname = '$nickname';
        WHERE fullname = '$fullname'";
  
  
    //Clear the fields
    $fullname = -1;
    $birth = '';
    $color = '';
    $visit = '';
    $nickname = '';
   
if ($delete) {
    $sql = "DELETE FROM fullname WHERE fullname='$fullname'";
    mysqli_query($conn, $sql);
}
    ?>

</html>