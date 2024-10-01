<?php 

namespace App\Controllers;

use App\Models\User;
 
class UserController extends Controller {

    public function index() {
        $user_model = new User();
        $all_users = $user_model->get_all();
        echo $this->templates->render('users::index', [ 'all_users' => $all_users ]);

    }

    public function edit( $id ) {
        $user_model = new User();

        $user = $user_model->get_by_id( $id );

        if (!$user) {
            header('HTTP/1.1 404 Not Found');
            echo $this->templates->render('404');
            exit();
        }

        echo $this->templates->render('users::edit', [ 'user' => $user ]);

    }

    public function do_edit( $id ) {
        $user_model = new User();

        $user = $user_model->get_by_id( $id );

        if (!$user) {
            header('HTTP/1.1 404 Not Found');
            echo $this->templates->render('404');
            exit();
        }

        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $role = trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $errors = [];

        if(!isset($_POST['username']) || ($username == '')) {
            $errors['username'] = 'Username is required';
        }

        if(!isset($_POST['role']) || ($role == '')) {
            $errors['role'] = 'Please select a role';
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

        if ($_POST['password'] !== '') {

            if(!isset($_POST['password']) || ($_POST['password'] == '')) {
                $errors['password'] = 'Password is required';
            }
    
            if($password !== $confirm_password) {
                $errors['confirm_password'] = 'Password does not match';
            }
    
        }

        $user_model = new User();

        if ($user_model->get_by_email($email, $id)) {
            $errors['email'] = 'Email already registered';
        }

        if ($user_model->get_by_username($username, $id)) {
            $errors['username'] = 'Username already registered';
        }


        if(count($errors) == 0) {

            $to_save = [
                'id' => $id, // id is a must to update existing record
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'role' => $role,
            ];

            if($_POST['password'] != '') {
                $to_save['password'] = password_hash( $password, PASSWORD_DEFAULT );
            }

            $user = $user_model->save($to_save);

            header('Location: /users?success=1');
        }  
        
        echo $this->templates->render('users::edit', [
            'old' => $_POST,
            'errors' => $errors,
            'user' => $user
        ]);        

    }

}