<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Register</title>
    <style>
        .container{
            width:70%;
            margin:100px auto;
        }


        #div_login{
            border: 1px solid gray;
            border-radius: 3px;
            width: 600px;
            height: 450px;
            box-shadow: 0px 2px 2px 0px  gray;
            margin: 0 auto;
        }

        #div_login h1{
            margin-top: 0px;
            padding: 10px;
            background-color: coral;
            color: white;
            font-family: sans-serif;
        }

        #div_login div{
            clear: both;
            margin-top: 20px;
            padding: 10px;
        }

        #div_login .textbox{
            width: 100%;
            padding: 10px;
        }

        #div_login input[type=submit]{
            padding: 10px;
            width: 100px;
            background-color: crimson;
            color: white;
        }

    </style>
</head>
<body>
<div class="container">
    <form method="post" action="registration.php">
        <div id="div_login">
            <h1>Register</h1>
            <div>
                <input type="text" class="textbox" name="user" placeholder="Username" required />
            </div>
            <div>
                <input type="email" class="textbox" name="email" placeholder="Email" required />
            </div>
            <div>
                <input type="password" class="textbox" name="password" placeholder="Password" required/>
            </div>
            <div>
                <input type="submit" value="Register" name="submit" id="submit" />
            </div>
        </div>
    </form>
</div>
</body>
