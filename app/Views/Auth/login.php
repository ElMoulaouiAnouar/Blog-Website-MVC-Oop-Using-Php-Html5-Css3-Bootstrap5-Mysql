<?php

$validate = new Validation();
$data = Validation::$data;
if(isset($_POST['btn_login'])){
    $data = [
        'email' => Filters::FilterInput($_POST['email']),
        'password' => Filters::FilterInput($_POST['password'])
    ];
    
    $validate->Validate($data,[
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if($validate->ErrorCount() == 0){
        $userController = new UserController();
        $userController->SignIn($data);
    }

}

?>


<div class="container">
    <div class="row">
        <div class="col-9 col-sm-6 col-md-5 mx-auto m-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h4>Login</h4>
                    </div>
                    <?php include '../app/Views/includes/alert.php'; ?> 
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="m-3">
                            <input type="text" name="email" id="" class="form-control" placeholder="Email" value="<?php  echo $data['email'] ?? '' ?>">
                        <div class="m-1 text-danger"><?php echo $validate->DisplayError('email') ?></div>
                        </div>
                        <div class="m-3">
                            <input type="password" name="password" id="" class="form-control" placeholder="Password" value="<?php  echo $data['password'] ?? '' ?>">
                        <div class="m-1 text-danger"><?php echo $validate->DisplayError('password') ?></div>
                        </div>
                        <div class="m-3">
                            <button name="btn_login" type="submit" class="btn btn-outline-primary form-control">Login</button>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <h5 >Or 
                        <a  style="text-decoration: none;" href="<?php echo BASE_URL.'user/register' ?>">Register</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>