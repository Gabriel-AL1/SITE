<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

            include("backend.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];

            //vereficando se o email é unico

            $verefy_query = mysqli_query($con, "SELECT email FROM usuarios WHERE email='$email'");
                
            if(mysqli_num_rows($verefy_query) !=0){
                echo "<div class = 'message'>
                    <p>Este email ja esta sendo usado, utilize outro</p>
                    </div><br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Retornar</button>";
            }
            else{

                mysqli_query($con,"INSERT INTO usuarios(nome, email, senha) VALUES('$username', '$email', '$password')") or die("ocorreu um erro");

                echo "<div class = 'message'>
                    <p>Registrado com sucesso!</p>
                    </div><br>";
                echo "<a href='login.php'><button class='btn'>Entre no site</button>";

            }
            }else{

        ?>
            <header>Registre-se</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" required>
                </div>
                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
                <div class="field input">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Registre-se" required>
                </div>
                
                <div class="link">
                    Ja possui uma conta? <a href="login.php">Entre!</a>
                </div>
            </form>
        </div>
        <?php }?>
    </div>
</body>
</html>