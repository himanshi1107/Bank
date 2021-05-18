<?php

session_start();

include 'connection.php';

    if(isset($_post['submit'])){
        $to = $_POST['to'];
        $amount = $_POST['balance'];
        $from = $_GET['id'];
    }
    $sql1 = mysqli_query($conn, " select * from userdetails where id='$to'");
    if(!$sql1){
        printf("Error: %s\n", mysqli_error($conn));
		exit();
    }
    while($res = mysqli_fetch_array($sql1)){
        $a = " update userdetails set ";
        $a .= "amount = amount + '$amount' where id='$to'";
        mysqli_query($conn, $a);
    }

    $sql2 = mysqli_query($conn, " select * from userdetails where id='$from'");
    if(!$sql2){
        printf("Error: %s\n", mysqli_error($conn));
		exit();
    }
    while($res = mysqli_fetch_array($sql2)){
        $b = " update userdetails set ";
        $b .= "amount = amount - '$amount' where id='$from'";
        mysqli_query($conn, $b);
    }

    $sql3 = mysqli_query($conn, " select * from userdetails where id='$to'");
    if(!$sql3){
        printf("Error: %s\n", mysqli_error($conn));
		exit();
    }
    while($res = mysqli_fetch_array($sql3)){
        $c = " insert into transferhistory (sender, receiver, amount) values ('".$from."', '".$to."', '".$amount."')";
        mysqli_query($conn, $c);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    alert("Your Transaction has been Successful");
    window.location.href="transactionHistory.php";
</script>
</body>
</html>