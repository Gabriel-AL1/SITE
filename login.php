<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
                include("backend.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $result = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email' AND senha='$password'") or die("Erro na consulta");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['nome'] = $row['username'];
                        $_SESSION['id'] = $row['id_usuario'];
                        header("Location: index.php");
                        exit();
                    }else{
                        echo "<div class='message'>
                        <p>Este email ou senha está incorreto.</p>
                        </div><br>";
                        echo "<a href='login.php'><button class='btn'>Retornar</button></a>";
                    }
                } else {
            ?>
            <header>Entre</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
                <div class="field input">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Login">
                </div>
                
                <div class="link">
                    Não possui uma conta? <a href="registro.php">Registre-se!</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
