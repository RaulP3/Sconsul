

<?php

$d =new DateTime('2023/01/01');

for($i = 0; $i < 12; $i++){
    $d->modify("+$i month");

    $meses = array(
        '01'=>31,
        '02'=>28,
        '03'=>31,
        '04'=>30,
        '05'=>31,
        '06'=>30,
        '07'=>31,
        '08'=>31,
        '09'=>30,
        '10'=>31,
        '11'=>30,
        '12'=>31,
    );

    $contador = 0;

    $total = ($i < 9) ? $meses['0'.($i+1)] : $meses [($i+1)];

    for($v = 1; $v <= $total; $v++){
        $d->modify("+1 days");
        ($d->format('D') == 'Tue') ? $contador++ : null;
    }

    echo "El mes numero ".($i+1)." tiene $contador dias martes <br>";
}
?>