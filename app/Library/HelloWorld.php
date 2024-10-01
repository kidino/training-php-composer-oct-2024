<?php
namespace App\Library;

class HelloWorld {
    function show() {
        echo "Hello World";
    }

    function hello( $name = 'Saudara' ) {
        echo 'Hello '. $name;
    }
}
