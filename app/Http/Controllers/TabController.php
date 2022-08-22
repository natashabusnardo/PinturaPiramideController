<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabController extends Controller
{
    public function tab($valor=2,$inicio=0,$fim=10){
        for($i = $inicio; $i<=$fim;$i++){
            echo "{$valor} x {$i} = ".($valor*$i)."</br>";
        }
    }
   // public function exec
}
