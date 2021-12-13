<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F7</title>
    </head>
    <body>
        <main>
            <?php 
            
            //Exempel för att skapa databasen i phpMyAdmin
                
            //Kodexempel med databaskoppling och select utan villkor

            //Skapa databaskopplingen - OBSERVERA att det inte är några felkontroller och/eller
            //undantagshantering ännu!

            $dns = "mysql:host=localhost;dbname=car;charset=utf8";
            $userName = "root";
            $password = "";

            /*
            $dbhsOptions = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            */

            $dbh = new PDO($dns, $userName, $password);

            //Skapa frågan
            $sql = "SELECT * FROM cars;";

            //Preparera frågan
            $stmt = $dbh->prepare($sql);

            //Exekvera frågan mot db
            $stmt->execute();

            //Visa data som vi fick i retur från databasen
            echo("<h2>Alla bilar i databasen!</h2>");

            while( $row = $stmt->fetch() ) {

                $id = $row["id"];
                $fabrikat = $row["fabrikat"];
                $modell = $row["modell"];
                $regnr = $row["regnr"];
                $farg = $row["farg"];

                echo("<p style=\"background: $farg\">id: $id, fabrikat: $fabrikat, modell: $modell, regnr: $regnr</p>") . PHP_EOL;

            }

            //Frigör minnet för returen från frågan och stäng ner kopplingen
            $stmt = null;
            $dbh = null;

            //Kodexempel med databaskoppling och select med villkor

             //Skapa databaskopplingen - OBSERVERA att det inte är några felkontroller och/eller
            //undantagshantering ännu!

            $dns = "mysql:host=localhost;dbname=car;charset=utf8";
            $userName = "root";
            $password = "";

            $dbh = new PDO($dns, $userName, $password);

            //Skapa frågan
            $sql = "SELECT * FROM cars WHERE fabrikat = :fabrikat AND farg != :farg;";

            $fabrikat = "Kia";
            $farg = "#000000";


            //Preparera frågan
            $stmt = $dbh->prepare($sql);

            //Knyt samman namngiven behållar med värde!
            $stmt->bindValue(":fabrikat", $fabrikat);
            $stmt->bindValue(":farg", $farg);

            //Exekvera frågan mot db
            $stmt->execute();

            echo("<h2>Bilar av fabrikat $fabrikat och som inte har färgen $farg!</h2>");
            //Visa data som vi fick i retur från databasen
            while( $row = $stmt->fetch() ) {

                $id = $row["id"];
                $fabrikat = $row["fabrikat"];
                $modell = $row["modell"];
                $regnr = $row["regnr"];
                $farg = $row["farg"];

                echo("<p style=\"background: $farg\">id: $id, fabrikat: $fabrikat, modell: $modell, regnr: $regnr</p>") . PHP_EOL;

            }

            //Frigör minnet för returen från frågan och stäng ner kopplingen
            $stmt = null;
            $dbh = null;

            ?>
        </main>
    </body>
</html>