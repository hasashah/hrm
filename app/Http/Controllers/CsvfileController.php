<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvfileController extends Controller
{
    public function index(){

        $file=fopen('book1.csv','r');

        while(!feof($file)){

            $data=fgetcsv($file);

            echo $data[0].' '. $data[1].' '.$data[2].'<br>';
        }

        fclose($file);



    }
}
