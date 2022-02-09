<?php
    /**
     * https://classroom.google.com/c/NDUyMDM2NjY0MTgx/a/NDYwNzg1MzgwNzIz/details
     */
    $partita1 = ['squadra1' => "Inter", 'squadra2' => "Bologna", 'risultato' => '1'];
    $partita2 = ['squadra1' => "Juventus", 'squadra2' => "Inter", 'risultato' => 'X'];
    $partita3 = ['squadra1' => "Torino", 'squadra2' => "Sampdoria", 'risultato' => '2'];
    $schedina = [$partita1, $partita2, $partita3];
    //2.5
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
    echo build_table($schedina);

?>
