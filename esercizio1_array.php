<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 (Array)</title>
</head>
<body>
    <?php
    //Specifiche dell'esercizio -> https://classroom.google.com/c/NDUyMDM2NjY0MTgx/m/NDQ5MjI1MTA5MzE5/details
        echo "<h1>Esercizio 1</h1><br>";
        $cognomi = ['Rossi', 'Bianchi', 'Verdi', 'Neri', 'Esposito'];
        $nomi = ['Dario', 'Alberto', 'Goffredo', 'Ladislao', 'Andromaco'];
        $corsi = ['IFTS', 'ABCD', 'WXYZ'];
        for ($i = 0; $i < 100; $i++) {    
            $voti[] = mt_rand(0, 100);  
        }
        $studente = [];
        $studenti = [];

        //1.1 & 1.2
        for ($j = 0; $j <= 99; $j++) {
            $s = $studente;
            $s["Cognome"] = $cognomi[rand(0, 4)]; 
            $s["Nome"] = $nomi[rand(0, 4)];
            $s["Corso"] = $corsi[rand(0, 2)];
            $s["Voto"] = $voti[rand(0, 99)];
            array_push($studenti, $s);
        }
        //1.3
        function build_table($array){
            $html = '<table>';
            $html .= '<tr>';
            foreach ($array[0] as $key=>$value) {
                    $html .= '<th>' . htmlspecialchars($key) . '</th>';
                }
            $html .= '</tr>';

            foreach ($array as $key=>$value) {
                $html .= '<tr>';
                foreach ($value as $key2=>$value2) {
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
                }
                $html .= '</tr>';
            }
        
            $html .= '</table>';
            return $html;
        }       
        echo build_table($studenti);
        echo "<hr>";
        //1.4 & 1.5
        $sufficienti = [];
        $studenti_mod = $studenti;
        for ($k = 0; $k <= 99; $k++) {
            if ($studenti_mod[$k]["Voto"] >= 60) {
                if ($studenti_mod[$k]["Corso"] == "IFTS") {
                    $studenti_mod[$k]["Link al corso"] = "http://www.ifts.com";
                }
                elseif ($studenti_mod[$k]["Corso"] == "ABCD") {
                    $studenti_mod[$k]["Link al corso"] = "http://www.abcd.com";
                }
                elseif ($studenti_mod[$k]["Corso"] == "WXYZ") {
                    $studenti_mod[$k]["Link al corso"] = "http://www.wxyz.com";
                }
                array_push($sufficienti, $studenti_mod[$k]);
            }
        }
        echo build_table($sufficienti);
    ?>
</body>
</html>