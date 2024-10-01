<?php 

namespace   App\Controllers;    

class MemberController extends Controller {

    public function index() {
        echo $this->templates->render('member::index');


    }
}