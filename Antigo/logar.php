<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/main.css">

    <title>Logar</title>
</head>

<body>
    <nav class="nav-top">
        <div class="nav-container">
            <ul class="nav-options">
                <li><a href="index.php">HOME</a></li>
            </ul>
        </div>
    </nav>

    <main class="main-index">
        <div class="main-outer-container">
            <div class="main-inner-container main-inner-alert">
                <?php
                $email = $_POST['email'];
                $password = $_POST['password'];
                include("../model/connectTodb.php");
                $sql = "SELECT `id`, `nome`, `email` FROM `users` WHERE `email` LIKE '$email' AND `senha` LIKE '$password'";

                try {
                    $result = $conn->query($sql);
                    if ($result->rowCount() > 0) {
                        session_start();

                        $data = $result->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['nome'] = $data['nome'];

                        echo "<span>Login realizado com sucesso!</span>";
                        echo "<span>Clique em HOME.</span>";
                    } else {
                        echo "<span>Email e/ou senha com erro!</span>";
                        echo "<span>Clique em HOME.</span>";
                    }
                } catch (Exception $e) {
                    echo "<span>Email e/ou senha com erro!</span>";
                    echo "<span>Clique em HOME.</span>";
                }
                ?>
            </div>
        </div>
    </main>

</body>
</html>