<?php
class UserController extends Controller{

    private $user_model = null;

    public function __construct()
    {
        $this->user_model = $this->model('User');
    }

    public function login(){
        if(isset($_SESSION['user_email']))
            header("location: ".BASE_URL.'post/index');
        else
            $this->view('Auth/login');
    }

    public function register(){
        if(isset($_SESSION['user_email']))
            header("location: ".BASE_URL.'post/index');
        else
            $this->view('Auth/register');
    }

    public  function create($data){
        $user = $this->user_model->find($data['email']);
        //check if user exists
        if(!$user){
            $users = $this->user_model->insert($data);
            if($users){
                session::Set("success","register is success");
                redirect::To("user/login");
            }
            else{
                session::Set("faild","register is faild");
                redirect::To('user/register');
            }
        }
        else{
            session::Set("faild","email is exists");
             redirect::To('user/register');
        }
    }

    public function SignIn($data){

        $user = $this->user_model->verfierLogin($data['email'],$data['password']);
        if($user){
            $_SESSION['user_id'] = $user->id_user;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->name;
            $_SESSION['type_user'] = $user->type_user;
            header("location: ".BASE_URL.'post/index');
        }
        else{
            session::Set("faild",'email or password inccorrect');
            //header("location: ".BASE_URL.'user/login');
        }

    }   


    public function logout(){
        session_unset();
        session_destroy();
        header("location: ".BASE_URL.'post/index');
    }

    
}