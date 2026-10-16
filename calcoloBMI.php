
<?php
$nome = $_POST["nome"];
$peso = $_POST["peso"];
$altezza = $_POST["altezza"];

$altezza = $altezza / 100;

$bmi = $peso / ($altezza * $altezza);

$bmi = round($bmi, 2);

if ($bmi < 18.5) {
    $categoria = "SOTTOPESO";
    $colore = "#e3efff";
    $bordo = "#0066ff";
}
elseif ($bmi < 25) {
    $categoria = "NORMOPESO";
    $colore = "#e2f4e5";
    $bordo = "#00802b";
}
elseif ($bmi < 30) {
    $categoria = "SOVRAPPESO";
    $colore = "#ffecd9";
    $bordo = "#ff8000";
}
else {
    $categoria = "OBESITÀ";
    $colore = "#ffe2e2";
    $bordo = "#ff3333";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato BMI</title>

    <style>
        body {
            background-color: #f1f3f5;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .card {
            width: 250px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid <?php echo $bordo; ?>;
            border-radius: 10px;
            background-color: <?php echo $colore; ?>;
        }

        h2 {
            margin-bottom: 10px;
        }

        .risultato {
            font-size: 32px;
            font-weight: bold;
            margin: 10px;
        }

        .categoria {
            font-weight: bold;
            color: <?php echo $bordo; ?>;
        }

        a {
            color: #212529;
        }
    </style>
</head>

<body>

    <h2>Il tuo BMI</h2>

    <div class="card">
        <h3><?php echo htmlspecialchars($nome); ?></h3>

        <p>
            Peso: <?php echo $peso; ?> kg -
            Altezza: <?php echo $altezza * 100; ?> cm
        </p>

        <div class="risultato">
            <?php echo number_format($bmi, 2, ".", ""); ?>
        </div>

        <p class="categoria">
            <?php echo $categoria; ?>
        </p>
    </div>

    <a href="index.html">Calcola di nuovo</a>

</body>
</html>