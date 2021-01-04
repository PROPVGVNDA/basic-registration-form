<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php if($_COOKIE['user'] == ''): ?>
        <div class="row">
            <div class="col">
                <h1>Registration Form</h1> 
                <form action="validation-form/check.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Enter login"><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password"><br>
                <button class="btn btn-success" type="submit">Sign Up</button>
                </form>
            </div>
            <div class="col">
                <h1>Log In Form</h1> 
                <form action="validation-form/auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Enter login"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password"><br>
                <button class="btn btn-success" type="submit">Sign In</button>
                </form>
            </div>
        <?php else: ?>
            <p>Hello <?php echo $_COOKIE['user'];?>. To log out press <a href="/exit.php">here</a></p>
            <p>To delete your account press <a href="/delete.php">here</a></p>
        <?php endif; ?>
        </div>
    </div>
</body>
</html>