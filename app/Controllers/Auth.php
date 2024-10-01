<?php 

namespace App\Controllers; 

use App\Controllers\Controller;
use App\Models\User;

class Auth extends Controller {
    public function login() {
        echo $this->templates->render('auth::login');
    }

    public function register() {
        echo $this->templates->render('auth::register');
    }

    public function do_register() {

        // var_dump( $_POST );

        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $errors = [];

        if(!isset($_POST['username']) || ($username == '')) {
            $errors['username'] = 'Username is required';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email address";
        }        

        if(!isset($_POST['email']) || ($email == '')) {
            $errors['email'] = 'Email is required';
        }

        if(!isset($_POST['name']) || ($name == '')) {
            $errors['name'] = 'Name is required';
        }

        if(!isset($_POST['password']) || ($_POST['password'] == '')) {
            $errors['password'] = 'Password is required';
        }

        if($password !== $confirm_password) {
            $errors['confirm_password'] = 'Password does not match';
        }

        $user_model = new User();

        if ($user_model->get_by_email($email)) {
            $errors['email'] = 'Email already registered';
        }

        if ($user_model->get_by_username($username)) {
            $errors['username'] = 'Username already registered';
        }

        if(count($errors) == 0) {
            $user = $user_model->save([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => password_hash( $password, PASSWORD_DEFAULT )
            ]);

            header('Location: /login?success=1');
        }

        echo $this->templates->render('auth::register', [
            'data' => $_POST,
            'errors' => $errors
        ]);

    }

    public function do_login() {
        // always sanitize if use in production
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = $_POST['password'];

        $user_model = new User();
        $user = $user_model->get_by_username( $username );

        if($user && password_verify($password, $user['password']) ) {
            $_SESSION['is_loggedin'] = true;
            $_SESSION['user'] = $user;

            header('Location: /member');
        } 

        echo $this->templates->render('auth::login', [
            'error' => 'Invalid username or password',
            'username' => $username
        ]);

    }

    public function logout() {
        unset( $_SESSION['is_loggedin'] );
        unset( $_SESSION['user'] );
        header('Location: /login?loggedout=1');
    }

}