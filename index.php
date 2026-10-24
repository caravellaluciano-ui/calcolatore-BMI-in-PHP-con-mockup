<?php
$errore = "";
$calcolato = false;

if (isset($_POST["calcola"])) {

    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altezza = $_POST["altezza"];

    if ($nome == "" || $peso == "" || $altezza == "") {
        $errore = "Errore: inserisci tutti i dati.";
    } elseif ($peso <= 0 || $altezza <= 0) {
        $errore = "Errore: peso e altezza devono essere maggiori di zero.";
    } else {

        $altezza = $altezza / 100;

        $bmi = $peso / ($altezza * $altezza);
        $bmi = round($bmi, 2);

        $calcolato = true;
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatore BMI</title>

    <style>
        body {
            background-color: #f1f3f5;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .card {
            background-color: white;
            padding: 24px;
            border-radius: 10px;
            max-width: 300px;
            margin: 40px auto;
        }

        .rigaForm {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #212529;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .errore {
            color: red;
            font-weight: bold;
        }

        .risultato {
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Calcolatore BMI</h1>

    <div class="card">

        <form action="" method="post">

            <div class="rigaForm">
                <label for="nome">Nome</label>
                <input id="nome" type="text" name="nome">
            </div>

            <div class="rigaForm">
                <label for="peso">Peso (kg)</label>
                <input id="peso" type="number" name="peso" step="any">
            </div>

            <div class="rigaForm">
                <label for="altezza">Altezza (cm)</label>
                <input id="altezza" type="number" name="altezza" step="any">
            </div>

            <button type="submit" name="calcola">Calcola</button>

        </form>

        <?php
        if ($errore != "") {
            echo "<p class='errore'>$errore</p>";
        }
        ?>

        <?php
        if ($calcolato == true) {
        ?>

            <h3><?php echo htmlspecialchars($nome); ?></h3>

            <p>Peso: <?php echo $peso; ?> kg</p>

            <p>Altezza: <?php echo $altezza * 100; ?> cm</p>

            <div class="risultato">
                BMI: <?php echo number_format($bmi, 2, ".", ""); ?>
            </div>

        <?php
        }
        ?>

    </div>

</body>
</html>