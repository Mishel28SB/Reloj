<?php

function imagelinethick($imagen, $x1, $y1, $x2, $y2, $color, $grueso = 1)
{
    /* esta forma funciona bien sólo para líneas ortogonales
    imagesetthickness($imagen, $grueso);
    return imageline($imagen, $x1, $y1, $x2, $y2, $color);
    */
    if ($grueso == 1) {
        return imageline($imagen, $x1, $y1, $x2, $y2, $color);
    }
    $t = $grueso / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($imagen, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
    $puntos = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($imagen, $puntos, 4, $color);
    return imagepolygon($imagen, $puntos, 4, $color);
}

?>