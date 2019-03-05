<?php
 
    session_start();
     
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: gra.php');
        exit();
    }
 
?>
 
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Trabian browser game</title>
</head>
 
<body>
     
    Only the dead have seen the end of war - Platon<br /><br />

    <a href="register.php">Register- sign up for free</a>
    <br /><br />
     
    <form action="login.php" method="post">
     
        Login: <br /> <input type="text" name="login" /> <br />
        Password: <br /> <input type="password" name="password" /> <br /><br />
        <input type="submit" value="Log in" />
     
    </form>
     
<?php
    if(isset($_SESSION['error']))    echo $_SESSION['error'];
?>
 
</body>
</html>