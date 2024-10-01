<?php 

function hello($name) {
    echo "<h1>$name</h1>";
}

class User {

    protected $name = '';
    
    function getName() {
        return $this->name;
    }

    function setName($name = '') {
        $this->name = $name;
    }
}

$user1 = new User();

$user1->setName("Siti");

hello( $user1->getName() );
