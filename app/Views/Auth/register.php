<?php
$data = Validation::$data;
$validate = new Validation();
if(isset($_POST['btn_register'])){
    $data = [
        //filter value input with my function filterInput
        'name' => Filters::FilterInput($_POST['name']),
        'email' => Filters::FilterInput($_POST['email']),
        'password' => Filters::FilterInput($_POST['password']),
        'confirmed_password' => Filters::FilterInput($_POST['confirmed_password'])
    ];
    $validate->Validate($data,[
        'name'  => 'required|max:10|min:5',
        'email' => 'required|email',
        'password' => 'required',
        'confirmed_password' => 'required|confirmed'
    ]);
    
    //check if not exists anny error send data to controller
    if($validate->ErrorCount() == 0){
        $user = new UserController();
        $user->create($data);
    }
}
    
?>

<div class="container">
    <div class="row">
        <div class="col-9 col-sm-6 col-md-5 mx-auto m-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h4>Register</h4>
                    </div>
                    <!-- include error if exists -->
                    <?php include '../app/Views/includes/alert.php'; ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="m-3">
                            <input type="text" name="name" id="" class="form-control" placeholder="Full Name" value="<?php echo $data['name'] ?? ''?>">
                            <div class="m-1 text-danger"><?php echo $validate->DisplayError('name') ?></div>
                        </div>
                        <div class="m-3">
                            <input type="text" name="email" id="" class="form-control" placeholder="Email" value="<?php echo $data['email'] ?? '' ?>">
                            <div class="m-1 text-danger"><?php echo $validate->DisplayError('email') ?></div>
                        </div>
                        <div class="m-3">
                            <input type="password" name="password" id="" class="form-control" placeholder="Password" value="<?php  echo $data['password'] ?? ''?>">
                            <div class="m-1 text-danger"><?php echo $validate->DisplayError('password') ?></div>
                        </div>
                        <div class="m-3">
                            <input type="password" name="confirmed_password" id="" class="form-control" placeholder="Confirmation Password">
                            <div class="m-1 text-danger"><?php echo $validate->DisplayError('confirmed_password') ?></div>
                        </div>
                        <div class="m-3">
                            <button name="btn_register" type="submit" class="btn btn-outline-primary form-control">Register</button>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <h5 >Or 
                        <a  style="text-decoration: none;" href="<?php echo BASE_URL.'user/login' ?>">Login</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>