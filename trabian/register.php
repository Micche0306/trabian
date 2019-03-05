<?php
 
    session_start();

    if (isset($_POST['email']))
        {
            //validiation ok
            $all_ok=true;

            //let's check nickname 
            $nick=$_POST['nick'];

            //let's check nickname lenght
            if ((strlen($nick)<3) || (strlen($nick)>20))
            {
                $all_ok=false;
                $_SESSION['e_nick']="nickname must have between 3 and 20 characters";
            }
        if ($all_ok==true)
        {
            it werks
        }
        }

 
?>
 
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Trabian- sign up for free</title>
</head>
 
<body>
     <form method="post">

        Nickname: <br /> <input type="text" name="nick"/><br />

        E-mail: <br /> <input type="text" name="email" /><br />

        Your password: <br /> <input type="password" name="pass1" /><br />

        Repeat password: <br /> <input type="password" name="pass2" /><br />

        <label>
        <input type="checkbox" name="tos" />I accept terms of use
        </label>

        <br />

        <input type="submit" value="register" />

     </form>


</body>
</html>