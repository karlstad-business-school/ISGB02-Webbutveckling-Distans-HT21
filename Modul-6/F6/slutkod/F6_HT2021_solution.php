<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F6</title>
    </head>
    <body>
        <main>
            <?php 
            
                //Kodexempel med utskrift
                echo("Detta är en första utskrift i PHP!");
                echo("<p>Detta är en andra utskrift i PHP!</p>");

                //Kodexempel med variabler
                $kurskod = "ISGB02";
                $kursnamn = "Webbutvecklig";
                $hp = 7.5;
                echo("<p>Kurskod: $kurskod</p>");
                echo("<p>Kursnamn: $kursnamn</p>");
                echo("<p>Högskolepoäng: $hp</p>");

                //Kodexempel med selektion
                $klienthp = 3.5;
                $serverhp = 4.0;
                $helkurs = 7.5;

                if($klienthp + $serverhp = $helkurs) {
                    echo("<p>Grattis du har nu klarat hela kursen!</p>");
                } else {
                    echo("<p>Nja du verkar ha kvar något på kursen!</p>");
                }

                //Kodexempel med iteration
                for($i = 1; $i < 7; $i++) {
                    echo("<h$i>Detta är rubriknivå $i</h$i>");
                }

            ?>
        </main>
    </body>
</html>