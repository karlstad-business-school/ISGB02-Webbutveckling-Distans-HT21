<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F10 - Gömda fält</title>
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
            <h1>PHP F10 - Först till 100 med gömda fält</h1>
        </header>

        <main>    
            <?php

                define("IMG", "<img src='https://openclipart.org/download/2821");

                $summa = 0;
                $antal = 0;

                if( isset( $_POST["skicka"] ) ) {
    
                    $key = $_POST["key"];
				    $method = "AES-128-ECB";
                    $summa = openssl_decrypt($_POST["summa"], $method, $key);
                    $antal = openssl_decrypt($_POST["antal"], $method, $key);;
                        
                    for($i = 1; $i <= 6; $i++) {
                        $slumptal = rand(1, 6);
                        echo(IMG . (26 + $slumptal) . "/Die" . $slumptal . ".svg' alt='Tärning " . $slumptal . "' />");
                        $summa += $slumptal;
                    }

                    $antal++;

                    echo("<p>Summan blev: $summa</p>");
                    echo("<p>Antalet gånger du kastat de 6 tärningarna är: $antal</p>");

                    if($summa >= 100) {
                        
                        $summa = 0;
                        $antal = 0;

                        echo("<p>För nytt spel tryck på 'Skicka'!</p>");
                    }

                }

                $key = time();
				$method = "AES-128-ECB";
                $encrypt_summa = openssl_encrypt($summa, $method, $key);
                $encrypt_antal = openssl_encrypt($antal, $method, $key);
            ?>

            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="submit" name="skicka" value="Skicka" />
                <input type="submit" name="rensa" value="Rensa" />
                <input type="hidden" name="key" value="<?php echo($key); ?>" />
                <input type="hidden" name="summa" value="<?php echo($encrypt_summa); ?>" />
                <input type="hidden" name="antal" value="<?php echo($encrypt_antal); ?>" />
            </form>

        </main>

    </body>

</html>