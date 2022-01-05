<html>
    <head>
        
        <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <title>Admin Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .container{
                width: 50%;
                top: -80%;
                left: -45%;
            }
            h3{
                text-align: center;
                margin: 2%;
                margin-bottom: 5%;
            }
            button{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3> Admin Login</h3>
        <form method="post" action="admin-panel.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address / Username</label>
            <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
          </div>
          <center><button type="submit" class="btn btn-primary" name="login">Log In</button></center>
        </form>
        </div>
    </body>
</html>
