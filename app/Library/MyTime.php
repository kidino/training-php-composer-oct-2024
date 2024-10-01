<?php 

namespace App\Library; 

class MyTime {

    function show() {
        echo date('Y-m-d H:i:s');
    }

    function readable() {
        echo date('F j, Y, g:i a');
    }

}