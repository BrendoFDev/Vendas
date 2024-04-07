<?php
require_once "php_action/db_connect.php";
session_start();
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 0) {
} elseif ($tipo == 1) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">
    <!-- <title>Nome do Site</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            padding: 0%;
            margin: 0%;
        }

        div.box_logo {
            margin: 20px;
        }

        input {
            background: none;
            border: none;
        }

        input#qtd {
            width: 10px;
            align-content: center;
        }
    </style>
</head>

<body>
    <div class="box_logo">
        <h1>Tech For US</h1>
    </div>
    <a href='index.php'>
        <button>Voltar</button>
    </a>
    <div class="box_itens">
        <form action="Cad_car.php" method="post"></form>
        <?php
        if ($_POST) {

            $id_prod = $_POST['nome_prod'];

            if ($id_prod == null) {
                $_SESSION['msg'] = "Escolha Pelo Menos Um Produto";
                header("location:index.php");
            } else {

                foreach ($id_prod as $key => $id) {
                    $sql = "SELECT * FROM produto where id_prod = $id and tipo=1  ";

                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nome = $row['nome_prod'];
                            $valor = $row['valor_prod'];
                            $qtd = $row['qtd_prod'];
                        }
        ?>
                        <form action="php_action/Cad_car.php"></form>
                        <table>
                            <tr>
                                <td><input type="text" name="nome" value="<?php echo $nome; ?>" disabled></td>
                                <td>
                                    <button type='button' id=less class=less>-</button>
                                    <input type='text' id='qtd' value=1 disabled></input>

                                    <button type='button' id='more' class='more'>+</button>
                                </td>
                                <td>R$ <input type="text" name="valor" id="valor" value="<?php echo $valor; ?>" disabled></td>
                            </tr>
                        </table>
                        </form>
                <?php
                    }
                }
                ?>

    </div>

    </table>
    <script>
        const less = document.querySelector("#less");
        const more = document.querySelector("#more");
        const counter = document.querySelector("#qtd");
        const valor = document.querySelector("#valor");

        let vl = valor.value;
        let qtd = counter.value;

        less.addEventListener('click', () => {
            qtd = qtd != 1 ? --qtd : 1;
            counter.value = qtd;
        });

        more.addEventListener('click', () => {
            qtd = qtd != <?php echo $qtd; ?> ? ++qtd : <?php echo $qtd; ?>;
            counter.value = qtd;
        });


        document.getElementById("totalValue").innerHTML = formatValue(total);
    </script>
<?php
            }
        }
?>
</div>

</body>

</html>