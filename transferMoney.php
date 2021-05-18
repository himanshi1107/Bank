<?php

session_start();

include 'connection.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['balance'];

    $sql = "select * from userdetails where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "select * from userdetails where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    //Conditions
    //For negative value
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Negative value cannot be transferred !")';
        echo '</script>';
    }
    //Insufficient balance
    else if ($amount > $sql1['amount']) {

        echo '<script type="text/javascript">';
        echo ' alert("Oops! You have Nnsufficient amount !")';
        echo '</script>';
    }
    //For 0 (zero) value
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Ohh! Zero value cannot be transferred !')";
        echo "</script>";
    } 
    else {
        $newbalance = $sql1['amount'] - $amount;
        $sql = "UPDATE userdetails set amount=$newbalance where id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['amount'] + $amount;
        $sql = "UPDATE userdetails set amount=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['user_name'];
        $receiver = $sql2['user_name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successfully !');
                                     window.location='transactionHistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f08b3db23.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap&family=Goblin+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user.css">
    <title>Transfer Page</title>
    <style>
        body {
            background-image: url(images/bg2.jpg);
            background-size: cover;
        }

        h2 {
            margin-top: 7%;
            color: black;
            text-align: center;
            font-size: 35px;
            font-weight: bold;
            font-family: 'Girassol', cursive;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        h3 {
            color: black;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            font-family: "Source Serif Pro", serif;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        @media only screen and (min-width: 600px){
            h2{
                margin-top: 10%;
                font-size: 28px;
            }
            h3{
                font-size: 22px;
            }
        }
        label {
            font-size: 24px;
            padding-top: 10px;
            color: black;
            padding-left: 20%;
            font-family: "Source Serif Pro", serif;
        }

        .form-select {
            width: 50%;
            height: 35px;
            margin-left: 20%;
            border-radius: 10px;
        }

        .form-control {
            width: 50%;
            margin-left: 20%;
            border-radius: 10px;
        }

        .btn {
            width: 220px;
            height: 50px;
            border: none;
            color: black;
            font-size: 22px;
            border-radius: 10px;
            transition: ease-out 0.3s;
            outline: none;
            font-family: "Source Serif Pro", serif;
            border: 3px solid black;
            position: relative;
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
            background: transparent;
            z-index: 1;
        }

        .btn:hover {
            color: white;
            cursor: pointer;
        }

        .btn:before {
            transition: 0.5s all ease;
            position: absolute;
            top: 0;
            left: 50%;
            right: 50%;
            bottom: 0;
            border-radius: 6px;
            opacity: 0;
            content: "";
            background-color: black;
        }

        .btn:hover:before {
            transition: 0.5s all ease;
            left: 0;
            right: 0;
            opacity: 1;
            z-index: -1;
        }
    </style>
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div class="container-lg">
        <h2>Transaction</h2>
        <?php
        include 'connection.php';

        $ids = $_GET['id'];
        $select = " select * from  userdetails where id='$ids' ";
        $result = mysqli_query($conn, $select);
        if (!$result) {
            echo "Error : " . $select . "<br>" . mysqli_error($conn);
        }
        $res = mysqli_fetch_assoc($result);
        ?>
        <div class="center-div">
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Current Amount</th>
                    </tr>
                    <tr>
                        <td scope="row"><?php echo $res['id']; ?></td>
                        <td><?php echo $res['user_name']; ?></td>
                        <td><?php echo $res['email']; ?></td>
                        <td><?php echo $res['amount']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <form method="post" name="credit" class="tabletext"><br>
            <h3 class="text-center pt-4">Transfer Amount Here..!</h3>
            <label><strong>Transfer To :</strong></label><br>
            <select name="to" class="form-select" aria-label="Default select example">
                <option selected>--Select User--</option>
                <?php
                include 'connection.php';

                $ids = $_GET['id'];
                $select = " select * from  userdetails where id!='$ids' ";
                $result = mysqli_query($conn, $select);
                if (!$result) {
                    echo "Error : " . $select . "<br>" . mysqli_error($conn);
                }
                while ($res = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $res['id']; ?>">
                        <?php echo $res['user_name']; ?> (Amount :
                        <?php echo $res['amount']; ?>)
                    </option>
                <?php
                }
                ?>
            </select>
            <br>
            <label><strong>Amount : </strong></label>
            <input type="number" class="form-control" name="balance" required>
            <br>
            <div class="text-center">
                <button class="btn" name="submit" type="submit" id="myBtn">Transfer Amount</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>