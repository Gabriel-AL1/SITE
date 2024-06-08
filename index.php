<?php
    session_start();
    include("backend.php");
    if(!isset($_SESSION['valid'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Configurações Computador</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Simulador de Configurações Computador</p>
        </div>
        <div class="right-links">

            <?php
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM usuarios WHERE id_usuario=$id");

            while($result = mysqli_fetch_assoc($query)){

                $res_Uname = $result['nome'];
        
            }
            
            ?>
            <a href="#">Alterar usuario</a>
            <a href="logout.php"><button class="btn"> Sair aqui </button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Ola <b><?php echo $res_Uname?></b>, Bem vindo!</p>
                </div>
            </div>
        </div>
    </main>
    <div id="componentes" class="container">
        <div class="form-container shadow-box">
            <h3>Escolha seus componentes:</h3>
            <div id="cpu" class="form-box">
                <form method="POST">
                    <h3>Processador</h3>
                    <div class="field">
                        <label for="marca">Marca</label>
                        <select name="marca" id="marca" onchange="AtualizarModelosCpu()">
                            <option value="">Selecione a marca</option>
                            <option value="amd">AMD</option>
                            <option value="intel">Intel</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="modeloCpu">Modelo</label>
                        <select name="modeloCpu" id="modeloCpu">
                            <option value="processador">Selecione o processador</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="gpu" class="form-box">
                <form method="POST">
                    <h3>Placa De Video</h3>
                    <div class="field">
                        <label for="marca1">Marca</label>
                        <select name="marca1" id="marca1" onchange="AtualizarModelosGpu()">
                            <option value="">Selecione a marca</option>
                            <option value="amd">AMD</option>
                            <option value="nvidia">NVIDIA</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="modeloGPU">Modelo</label>
                        <select name="modeloGPU" id="modeloGPU">
                            <option value="placadevideo">Selecione a placa de video</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="ram" class="form-box">
                <form method="POST">
                    <h3>Memoria Ram</h3>
                    <div class="field">
                        <label for="modeloRam">Tecnologia</label>
                        <select name="modeloRam" id="modeloRam">
                            <option value="">Selecione a tecnologia</option>
                            <option value="ddr4">DDR4</option>
                            <option value="ddr5">DDR5</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="qtd">Quantidade</label>
                        <select name="qtd" id="qtd">
                            <option value="">Selecione a quantidade</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="Armazenamento" class="form-box">
                <form method="POST">
                    <h3>Armazenamento</h3>
                    <div class="field">
                        <label for="storage">Tipo</label>
                        <select name="storage" id="storage">
                            <option value="">Selecione o armazenamento</option>
                            <option value="hd">HD</option>
                            <option value="sdd">SDD</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="qtd1">Quantidade</label>
                        <select name="qtd1" id="qtd1">
                            <option value="">Selecione a quantidade</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="Fonte" class="form-box">
                <form method="POST">
                    <h3>Fonte</h3>
                    <div class="field">
                        <label for="fonte">Fonte</label>
                        <select name="fonte" id="fonte">
                            <option value="">Selecione a fonte</option>
                            <option value="450w">Fonte 450W</option>
                            <option value="500w">Fonte 500W</option>
                            <option value="550w">Fonte 550W</option>
                            <option value="600w">Fonte 600W</option>
                            <option value="650w">Fonte 650W</option>
                        </select>
                    </div>
                    <button class="btn submit" type="button" onclick="Teste()"><b>Calcule a compatibilidade</b></button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
