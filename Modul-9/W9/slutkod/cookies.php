<?php

    define("IMG", "<img src='https://openclipart.org/download/2821");

    $summa = 0;
    $antal = 0;
    $stringToEcho = "";

    if( isset( $_POST["skicka"] ) ) {

        if( isset($_COOKIE["summa"]) && isset($_COOKIE["antal"] ) ) {
            $summa = $_COOKIE["summa"];
            $antal = $_COOKIE["antal"];
        } 
            
        for($i = 1; $i <= 6; $i++) {
            $slumptal = rand(1, 6);
            $stringToEcho .= IMG . (26 + $slumptal) . "/Die" . $slumptal . ".svg' alt='Tärning " . $slumptal . "' />" . PHP_EOL;
            $summa += $slumptal;
        }

        $antal++;

        $stringToEcho .= "<p>Summan blev: $summa</p>" . PHP_EOL;
        $stringToEcho .= "<p>Antalet gånger du kastat de 6 tärningarna är: $antal</p>" . PHP_EOL;

        if($summa >= 100) {
            
            $summa = 0;
            $antal = 0;

            $stringToEcho .= "<p>För nytt spel tryck på 'Skicka'!</p>";
        }

        setcookie("summa", $summa, time() + 3600);
        setcookie("antal", $antal, time() + 3600);

    }

    if(isset($_POST["rensa"])) {
        setcookie("summa", "");//, time() - 3600);
        setcookie("antal", "");//, time() - 3600);
        unset($_COOKIE["summa"]);
        unset($_COOKIE["antal"]);
    }
?>  
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F9 - kakor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style> 
            img {
                width: 15%;
                height: 15%;
                padding-right: 5px;
                padding-bottom: 10px;
            }
        </style>
    </head>

    <body class="container p-2">
        <header class="jumbotron text-center">
            <h1>PHP F9 - Först till 100 med kakor</h1>
        </header>

        <main>    

            <?php echo($stringToEcho); ?>

            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="submit" name="skicka" value="Skicka" />
                <input type="submit" name="rensa" value="Rensa" />
            </form>

        </main>

    </body>

</html>