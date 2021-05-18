<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap&family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/user.css">
    <title>Document</title>
    <style>
        body{
	        background-image: url(images/bg2.jpg);
            background-size: cover;
        }
        h2 {
            font-size: 40px;
            color: black;
            margin-top: 7%;
            text-align: center;
            padding: 16px 0 0 0;
            font-family: "Goblin One", cursive;
        }
        @media only screen and (max-width: 600px){
            h2{
                margin-top: 9%;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
<?php include 'navigation.php';?>
    <h2>Transaction History</h2>
    <div class="center-div">
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Sr.No.</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'connection.php';

                    $sql = " select * from transaction ";

                    $query = mysqli_query($conn, $sql);

                    while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $res['sno']; ?></td>
                            <td><?php echo $res['sender']; ?></td>
                            <td><?php echo $res['receiver']; ?></td>
                            <td><?php echo $res['amount']; ?></td>
                            <td><?php echo $res['datetime']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>