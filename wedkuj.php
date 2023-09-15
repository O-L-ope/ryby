<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link href="styl_1.css" rel=stylesheet type="text/css">
</head>
<body>
        <?php 
            $mysqli = mysqli_connect("localhost", "root", "", "wedkowanie");
            //połączenie
        ?>
    <div class="banner">
        <h1>Portal dla wędkarzy</h1>
    </div>


    <div class="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        
        <ol>
            <?php
                //$query = mysqli_query($mysqli, "SELECT nazwa, akwen, wojewodztwo FROM ryby, lowisko WHERE rodzaj = 3;");
                $query = mysqli_query($mysqli, "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby, lowisko WHERE lowisko.Ryby_id = ryby.id AND lowisko.rodzaj = 3;");
                while($r = mysqli_fetch_row($query)){
                    echo "<li>".$r[0]."".$r[1].",".$r[2]."</li>";
                }
            
            ?>
        </ol>
    <!-- </div>
    <div class="lewy2"> -->
        <h3>Ryby drapieżne naszych wód</h3>
        <table class="tabela">
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                $q1 = mysqli_query($mysqli, "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;");
                $lp = 1;
                while($r1 = mysqli_fetch_row($q1)){
                    echo "<tr><td>".$lp."</td><td>".$r1[1]."</td><td>".$r1[2]."</td></tr>";
                    $lp++;
                }
            
                mysqli_close($mysqli);
            ?>
        </table>
    </div>

    <div class="prawy">
        <img class="obraz" src="ryba2.jpg" alt="Sum"/>
        <br>
        <a href="kwarendy.txt">Pobierz kwarendy</a>

    </div>

    <div class="stopka">
        <p>Stronę wykonał: numer5</p>
    </div>
</body>
</html>