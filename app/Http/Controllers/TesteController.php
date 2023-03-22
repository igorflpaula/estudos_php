<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){
        // echo "A soma de $a + $b é: ".($a+$b);
        
        // array associativo
        // return view('site.teste', ['a'=> $a, 'b'=>$b]); 
        
        // compact
        return view('site.teste', compact('p1', 'p2')); 

        //with
        // return view ('site.teste')->with('p1', $p1)->with('p2', $p2);
    }
}
