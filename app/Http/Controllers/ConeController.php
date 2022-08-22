<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConeController extends Controller
{
    public function geratriz($h, $r) {
        return sqrt(pow($h, 2) + pow($r, 2));
    }

    public function areaLateral($r, $g) {
        return ((3.14) * $r * $g);
    }

    public function areaCirculo($r) {
        return ((3.14)*pow($r, 2));
    }

    public function areaBase($ab) {
        return pow(($ab * 2), 2);
    }

    public function areaTotal($r,$g) {
        return $this->areaLateral($r, $g) + $this->areaCirculo($r);
    }

    public function litrosTinta($at) {
        return $at * 3.45;
    }

    public function latasTinta($lt) {
        return ceil($lt / 18);
    }

    public function valorTinta($la, $tt) {
        if ($tt == 1) {
            return $la * 238.90;
        } else if ($tt == 2) {
            return $la * 467.98;
        } else {
            return $la * 758.34;
        }
    }

    public function cone($h,$r,$nivel){
        $g = $this->geratriz($h, $r);
        $qtdlitro = $this->litrosTinta($this->areaTotal($r,$g));
        $qtdlata = $this->latasTinta($qtdlitro);
        echo "<h1>Cone</h1> <br>"
        . "Raio: " . $r . " <br>"
        . "Altura: " . $h . " <br>"
        . "Nível: " . $nivel . " <br>"
        . "<hr>"
        . "Geratriz: " . $g ."<br>"
        . "<hr>"
        . "Área do Fundo: " . $this->areaCirculo($r) . " <br>"
        . "Área Lateral Cone: " . $this->areaLateral($r, $g) . " <br>"
        . "Área Total: " . $this->areaTotal($r, $g) . " <br>"
        . "<hr>"
        . "Litros: " . $qtdlitro . " <br>"
        . "Latas: " . $qtdlata . " <br>"
        . "<hr>"
        . "Preço Total: " . $this->valorTinta($qtdlata, $nivel) . " <br>";
    }

    public function index($h = 8, $r = 6, $nivel = 1){
        ConeController::cone($h,$r,$nivel);
    }
}
