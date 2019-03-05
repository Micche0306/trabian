<?php
 
    session_start();
     
    if ((!isset($_POST['loginn'])) || (!isset($_POST['password'])))
    {
        header('Location: index.php');
        exit();
    }
 
    require_once "connect.php";
 
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
     
    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['password'];
         
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
     
        if ($result = @$connection->query(
        sprintf("SELECT * FROM users WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($connection,$loginn),
        mysqli_real_escape_string($connection,$password))))
        {
            $howmanyusers = $result->num_rows;
            if($howmanyusers>0)
            {
                $_SESSION['logged'] = true;
                 
                $wiersz = $result->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['user'];
                $_SESSION['wood'] = $wiersz['wood'];
                $_SESSION['stone'] = $wiersz['stone'];
                $_SESSION['wheat'] = $wiersz['wheat'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['premiumleft'] = $wiersz['premiumleft'];
                 
                unset($_SESSION['error']);
                $result->free_result();
                header('Location: game.php');
                 
            } else {
                 
                $_SESSION['error'] = '<span style="color:red">Wrong login or password!</span>';
                header('Location: index.php');
                 
            }
             
        }
         
        $polaczenie->close();
    }
     
?>