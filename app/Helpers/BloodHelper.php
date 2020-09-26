<?php

namespace App\Helpers;

class BloodHelper
{
    /**
     * @param $n
     * @return int
     */
    public static function factorial($n)
    {
        global $save_factorial;
        if ($n == 1 || $n == 0) {
            return 1;
        }
        if (isset($save_factorial[$n])) {
            return $save_factorial[$n];
        }
        $save_factorial[$n] = bcmul($n, self::factorial($n - 1));
        return $save_factorial[$n];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function createGround()
    {

        $t = random_int(1, 50);
//            $t=random_int(1, 1);
        echo $t . "<br>";
        $grounds["nItems"] = $t;
        for ($i = 0; $i < $t; $i++) {
            $n = random_int(3, 20);
//                $n=random_int(3, 6);
            $m = random_int(0, 5);
//                $m=random_int(0, 2);

            echo $n . " " . $m . "<br>";
            $grounds["item"][$i]["field"]["nSlots"] = $n;
            $grounds["item"][$i]["field"]["pieces"] = $m;
            for ($z = 0; $z < $n; $z++) {
                $block = random_int(0, 50);
                echo $block . " ";
                $grounds["item"][$i]["field"]["slots"][$z] = $block;
            }
        }
        return $grounds;
    }

    public static function getBestFieldArea($field)
    {
        echo "**********************************************<br>";
        $pieces = $field["field"]["pieces"];
        $initArea = self::getFieldArea($field["field"]["slots"]);
        echo "initArea: " . $initArea . "<br>";
        $testAreas = [];
        if ($pieces > 0) {
            $testAreas = self::test2($pieces, $field["field"]["slots"]);

        }
        echo "Init area:" . $initArea . "<br>";
        $maxArea = 0;
        $piecesUsed = 0;
        $pushedIn = 0;
        foreach ($testAreas as $key => $testArea) {
            foreach ($testArea as $key2 => $slots) {
                $calcTestArea = self::getFieldArea($slots, true);
                if ($calcTestArea > $maxArea) {
                    $maxArea = $calcTestArea;
                    $piecesUsed = $key;
                    $pushedIn = $key2;
                }
                $maxArea = ($calcTestArea > $maxArea) ? $calcTestArea : $maxArea;
//                    dd($calcTestArea);
                echo "test area #" . $key . " " . $key2 . ": " . $calcTestArea . "<br>";
            }
        }
        echo "**********************************************<br>";
        if ($maxArea > $initArea) {
            echo "Max area result: " . $maxArea . ". With " . $piecesUsed . " pieces in " . $pushedIn;
        } else {
            echo "Max area result is initial area: " . $initArea;
        }
    }

    public static function getFieldArea($slots, $debug = false)
    {
        $totalArea = 0;
        foreach ($slots as $position => $slot) {
            if ($position == 0 || $position == count($slots) - 1) {
                $totalArea += 0;
            } else {
                $cl = intval($slots[$position - 1]);
                $cr = intval($slots[$position + 1]);
                $cs = intval($slot);
                if ($cl > $cr) {
                    $ctc = $cr;
                } else {
                    $ctc = $cl;
                }
                /**  TODO: tener en cuenta la pared izquierda de posiciones inferiores a la anterior para detectar los "valles largos". $lastWall se reinicia cuando encuentra una pared mayor o la última de la serie */

//                $ctc=(intval($cl)>=intval($cr))?$cl:$cr;
                $areaSlot = $ctc - $cs;
                $areaSlot = ($areaSlot < 0) ? 0 : $areaSlot;
                echo "item: " . $position . "cl:" . $cl . " - cr" . $cr . " - cs:" . $cs . " - ctc:" . $ctc . " area: " . $areaSlot . " <br>";
                $totalArea += $areaSlot;
            }
        }
        return $totalArea;
    }

    private static function test2($pieces, $arra, $arrayExclude = null, $arrayValues = null)
    {
        $arraResult = [];
        for ($p = 1; $p <= $pieces; $p++) {
            foreach ($arra as $item => $value) {

                $arraResult[$p][$item] = $arra;
                $arraResult[$p][$item][$item] += $p;

                /** TODO: probar a volver a llamar aquí a la función. Añadir parámetros $arrayExclude[] y $arrayValues[] para
                 * asignar los valores en posiciones y que repita la operación salvando esos items con esos valores de esa
                 * forma podría decirle que excluya la posición 1, con valor 1, y que reparta el resto entre los demás items.
                 * Esto haciéndolo recursivo podríamos cubrir todas las combinaciones
                 */
            }
        }
        return $arraResult;
    }


    public static function test()
    {
        $pieces = 2;
        $arra[0] = 1;
        $arra[1] = 10;
        $arra[2] = 15;
        $arraResult = self::test2($pieces, $arra);

        dd($arraResult);

//casos
        // usamos una pieza
        $arra[0] += 1; // => new array
        /******/
        $arra[1] += 1; // => new array
        /******/
        $arra[2] += 1; // => new array
        //usamos dos piezas
        $arra[0] += 2; // => new array
        /*******/
        $arra[0] += 1;
        $arra[1] += 1; // => new array
        /*******/
        $arra[0] += 1;
        $arra[2] += 1; // => new array
        /********/
        $arra[1] += 2; // => new array
        /********/
        $arra[1] += 1;
        $arra[2] += 1; // => new array
        /*********/
        $arra[2] += 2; // => new array

        $arra[0] = 2;
        $arra[1] = 10;
        $arra[2] = 15;

        $arra[0] = 1;
        $arra[1] = 11;
        $arra[2] = 15;

        $arra[0] = 1;
        $arra[1] = 10;
        $arra[2] = 16;

        $arra[0] = 3;
        $arra[1] = 10;
        $arra[2] = 15;

        $arra[0] = 2;
        $arra[1] = 11;
        $arra[2] = 15;

        $arra[0] = 2;
        $arra[1] = 10;
        $arra[2] = 16;

        $arra[0] = 1;
        $arra[1] = 12;
        $arra[2] = 15;

        $arra[0] = 1;
        $arra[1] = 12;
        $arra[2] = 16;

        $arra[0] = 1;
        $arra[1] = 10;
        $arra[2] = 17;

    }

}
