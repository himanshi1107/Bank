<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f08b3db23.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        header {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            z-index: 10;
            background-color: #000000;
            padding: 7px 10px;
        }

        header .head {
            -webkit-display: flex;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo a {
            font-size: 35px;
            text-decoration: none;
            color: #cf125a;
            font-weight: 700;
            font-family: Lucida Bright, Georgia, serif;
            margin: 10px;
        }

        header .logo a span {
            color: white;
            font-family: Lucida Bright, Georgia, serif;
        }

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: black;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .overlay-content {
            position: relative;
            top: 25%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
            list-style: none;
            margin: 25px;
        }
        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: white;
            display: block;
            transition: 0.3s;
        }
        .overlay a:hover,
        .overlay a:focus {
            color: #cf125a;
        }
        .nav-link{
            font-weight: bold;
            font-family: 'Girassol', cursive;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
        }
        .overlay .closebtn {
            position: absolute;
            top: 0;
            right: 10px;
            font-size: 80px;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 20px
            }

            .overlay .closebtn {
                font-size: 40px;
                top: 0;
                right: 5px;
            }
        }
        .humberger-menu {
            position: absolute;
            top: 5px;
            right: 15px;
            font-size: 40px;
            cursor: pointer;
            color: #f1f1f1;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        @media only screen and (max-width: 600px){
            header{
                padding: 5px;
            }
            header .logo a{
                font-size: 20px;
            }
            .humberger-menu{
                font-size: 23px;
            }
            .overlay a{
                font-size: 30px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
                <a href="index.html">Maharashtra <span>Bank</span></a>
                <span></span>
            </div>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="index.php" class="nav-link">Home</a>
                <a href="userDetails.php" class="nav-link">Customers</a>
                <!-- <a href="transferMoney.php" class="nav-link">Transfer Money</a> -->
                <a href="transactionHistory.php" class="nav-link">Transaction History</a>
                <a href="about.php" class="nav-link">About Us</a>
            </div>
        </div>
        <span class="humberger-menu" onclick="openNav()">&#9776;</span>
    </header>

    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>

</body>

</html>