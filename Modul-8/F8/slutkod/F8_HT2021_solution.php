<?php
    //Ett enkelt exempel på OO-kod i PHP

    class bil {
        private $fabrikat;
        private $modell;
        private $regnr;
        private $farg;

        public function __construct($infabrikat, $inmodell, $inregnr, $infarg) {
            $this->fabrikat = $infabrikat;
            $this->modell = $inmodell;
            $this->regnr = $inregnr;
            $this->farg = $infarg;
        }

        public function returneraBilData() {
            return $this->fabrikat . " " . $this->modell . " " . $this->regnr . " " . $this->farg;
        }

        public function getFarg() {
            return $this->farg;
        }
    }

    //Ett enkelt exempel på egen funktioner i PHP
    function skapaNyDiv($indata = "Standard data...") {
        return "<div>$indata</div>";
    }

    //Kodexempel med formulär, databaskoppling och undantagshantering
    function checkFormData() {

        if(isset($_POST["btnSend"])) {
            $fabrikat = $_POST["fabrikat"];
            $modell = $_POST["modell"];
            $regnr = $_POST["regnr"];
            $farg = $_POST["farg"];

            if(strlen($fabrikat) === 0) {
                echo("Fabrikat saknas!");
                return false;
            } 

            if(strlen($modell) === 0) {
                echo("Modell saknas!");
                return false;
            } 

            if(strlen($regnr) === 0) {
                echo("Regnr saknas!");
                return false;
            } 
			
            //Om allt ok databaskoppling med undantagshantering
            try { //Demo undantagshantering och PDO

                $dns = "mysql:host=localhost;dbname=car;charset=utf8";
                $userName = "root";
                $password = "";
    
                $dbh = new PDO($dns, $userName, $password);
    
                //Skapa frågan
                $sql = "INSERT INTO cars(fabrikat, modell, regnr, farg) VALUES(:fabrikat, :modell, :regnr, :farg);";
    
                //Preparera frågan
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(":fabrikat", $fabrikat);
                $stmt->bindValue(":modell", $modell);
                $stmt->bindValue(":regnr", $regnr);
                $stmt->bindValue(":farg", $farg);

                //Exekvera frågan mot db
                $stmt->execute();
            
                //Frigör minnet för returen från frågan och stäng ner kopplingen
                $stmt = null;
                $dbh = null;


            } catch(PDOException $e) {
                echo($e->getMessage());
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8</title>
    </head>
    <body>
        <main>
            <?php 
                
            //Kodexempel med OO
            $bil = new bil("Saab", "9000", "789AAA", "#ff0000");
            echo("<p style=\"color : " . $bil->getFarg() . "\">" . $bil->returneraBilData() . "</p>");

            //Kodexempel med egna funktioner
            echo(skapaNyDiv());
            echo(skapaNyDiv("Värde som skickas till funktionen..."));

            //Kodexempel med formulär, databaskoppling och undantagshantering
            checkFormData();

            ?>
            <form action="F8_HT2021_solution.php" method="post">
                <input type="text" name="fabrikat" />
                <input type="text" name="modell" />
                <input type="text" name="regnr" />
                <input type="color" name="farg" />
                <input type="submit" name="btnSend" value="Skicka" />
            </form>
        </main>
    </body>
</html>