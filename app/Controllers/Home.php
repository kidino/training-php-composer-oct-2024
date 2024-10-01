<?php 

namespace App\Controllers; 

class Home extends Controller {
 
    public function index() {
        echo $this->templates->render('home');
    }

    public function about() {
        echo $this->templates->render('about');
    }

    public function login() {
        echo "<h1>This is LOGIN</h1>";
        echo "<a href='/'>HOME</a> | ";
        echo "<a href='/login'>LOGIN</a>";
    }
}