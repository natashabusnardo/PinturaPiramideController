<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiramideController extends Controller
{
    public function areaLateral($h, $ab) {
        return sqrt(pow($h, 2) + pow($ab, 2));
    }

    public function areaTriangulo($g, $ab) {
        return (($g * ($ab * 2)) / 2);
    }

    public function areaBase($ab) {
        return pow(($ab * 2), 2);
    }

    public function areaTotal($g, $ab) {
        return ($this->areaTriangulo($g, $ab) * 4) + $this->areaBase($ab);
    }

    public function volumePiramide($ab, $h) {
        return ($this->areaBase($ab) * $h) / 3;
    }

    public function litrosTinta($at) {
        return $at / 4.76;
    }

    public function latasTinta($lt) {
        return ceil($lt / 18);
    }

    public function valorTinta($la, $tt) {
        if ($tt == 1) {
            return $la * 127.90;
        } else if ($tt == 2) {
            return $la * 258.98;
        } else {
            return $la * 344.34;
        }
    }

    public function piramide($h,$ab,$tt=1){
        $g = $this->areaLateral($h, $ab);
        $qtdlitro = $this->litrosTinta($this->areaTotal($g, $ab));
        $qtdlata = $this->latasTinta($qtdlitro);
        echo "<h1>Pintura da pirâmide</h1> <br>"
        . "ab: " . $ab . " <br>"
        . "h: " . $h . " <br>"
        . "al: " . $g . " <br>"
        . "Área Triangulo: " . $this->areaTriangulo($g, $ab) . " <br>"
        . "Área Base: " . $this->areaBase($ab) . " <br>"
        . "Área Total: " . $this->areaTotal($g, $ab) . " <br>"
        . "Tipo de Tinta: " . $tt . " <br>"
        . "Litros: " . $qtdlitro . " <br>"
        . "Latas: " . $qtdlata . " <br>"
        . "Preço: " . $this->valorTinta($qtdlata, $tt) . " <br>"
        . "Volume: " . $this->volumePiramide($ab, $h) . " <br>";
    }
}
