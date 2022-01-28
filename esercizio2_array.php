<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 2 (Array)</title>
</head>
<body>
    <?php 
    //Specifiche dell'esercizio -> https://classroom.google.com/c/NDUyMDM2NjY0MTgx/m/NDQ5MjI1MTA5MzE5/details
        echo "<h1>Esercizio 2</h1><br>";
        $courseNames = ['IFTS', 'ABCD', 'WXYZ'];
        for ($i = 0; $i <= 99; $i++) { //100 date
            $timestamp = mt_rand((time() - (730 * 24 * 60 * 60)), (time() + (730 * 24 * 60 * 60))); //Data casuale tra ~2 anni fa e ~2 anni da ora
            $randomDate = date("Y-m-d", $timestamp);
            $coursesStart[] = $randomDate;
        }
        $coordNames = ['Rossi', 'Marini', 'Guiducci', 'Atzei', 'Romano'];
        for ($j = 0; $j <= 99; $j++) {//100 numeri di partecipanti
            $participantsNum[] = mt_rand(5, 30); //Tra 5 e 30 partecipanti
        }
        $course = [];
        $courses = [];
        $namesAndDates = [];

        for ($j = 0; $j <= 29; $j++) {
            //$c_temp = $course;
            //$c_temp2 = $course; //Array di soli nomi di corso e date di inizio
            $c_temp["nome"] = $courseNames[rand(0, 2)];
            $c_temp2["nome"] = $c_temp["nome"];
            $c_temp["inizio"] = $coursesStart[rand(0, 99)];
            $c_temp2["inizio"] = $c_temp["inizio"];
            array_push($namesAndDates, $c_temp2);
            $c_temp["coordinatore"] = $coordNames[rand(0, 4)];
            $c_temp["n_partecipanti"] = $participantsNum[rand(0, 99)];
            array_push($courses, $c_temp);
        }

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

        //2.6
        echo build_table($namesAndDates);    
        echo "<hr>";
        
        //2.7
        $namesAndDates_mod = $namesAndDates;
        $yetToStart = [];
        for ($k = 0; $k < (count($namesAndDates)-1); $k++) {
            if ($namesAndDates_mod[$k]["inizio"] > date("Y-m-d", time())) {
                $namesAndDates_mod[$k]["link_iscrizione"] = './iscrizioni.php';
                array_push($yetToStart, $namesAndDates_mod[$k]);
            }
        }
        echo build_table($yetToStart);
        echo "<hr>";

        //2.8
        $coord = 'Rossi';
        $coursesByCoord = [];
        for ($n = 0; $n < (count($courses)-1); $n++) {
            if ($courses[$n]["coordinatore"] == $coord) {
                array_push($coursesByCoord, $courses[$n]);
            }
        }
        if (count($coursesByCoord) > 0) {
            echo "$coord coordina almeno un corso.<br>";
        }
        else {
            echo "$coord non coordina corsi.<br>";
        }
        $oldestByCoord = array_column($coursesByCoord, "inizio");
        array_multisort($oldestByCoord, SORT_ASC, $coursesByCoord); //Ordina i corsi di $coordinatore in ordine ascendente in base al valore della chiave
        if (count($coursesByCoord) > 0) {
            $year = substr($coursesByCoord[0]["inizio"], 0, 4); //Contiene i primi quattro caratteri (cioè l'anno) del valore "inizio" del primo elemento dell'array 
            echo "Il corso più vecchio coordinato da $coord ha data di inizio " . $coursesByCoord[0]["inizio"] . " e anno di inizio $year.<hr>";
        }

        //2.9
        $maxParticipants = [];
        $courses_temp = $courses;
        $participants = array_column($courses_temp, 'n_partecipanti'); //Contiene una colonna di partecipanti dei corsi
        array_multisort($participants, SORT_DESC, $courses_temp); //Ordinamento discendente dei corsi in base al numero di partecipanti
        $maxParticipants[0] = $courses_temp[0];
        $maxVal = $courses_temp[0]['n_partecipanti'];
        for ($m = 1; $m < (count($courses_temp)-1); $m++) {
            if ($courses_temp[$m]['n_partecipanti'] == $maxVal) {
                //array_push($courses_temp[$m], $maxParticipants); NON FUNZIONA
                $maxParticipants[$m] = $courses_temp[$m];
            }
        }
        echo "Corso/i con più partecipanti: <br>";
        for ($p = 0; $p < count($maxParticipants); $p++) {
            print_r($maxParticipants[$p]);
            echo "<br>";
        }
        echo "<hr>";

        //2.10
        $yetToStart_temp = $yetToStart;
        $dates = array_column($yetToStart_temp, 'inizio');
        array_multisort($dates, SORT_ASC, $yetToStart_temp);
        for ($k = 0; $k <= count($yetToStart_temp); $k++) {
            if ($yetToStart_temp[$k]["inizio"] > date("Y-m-d", time())) {
                echo "Il prossimo corso in partenza è: ";
                print_r($yetToStart_temp[$k]);
                break;
            }
        }
    ?>
</body>
</html>