<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand no_hover" href="<?php echo BASE_URL.'post/index' ?>">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-Bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo BASE_URL.'post/index' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <?php
                if(isset($_SESSION['user_email'])){?>
                    <li>
                        <a class="nav-link" href="<?php echo BASE_URL.'dashboard/index' ?>">Dashboard</a>
                    </li>
                    <?php }?>
                </ul>

                <ul class="navbar-nav d-flex align-items-center">

                    <?php
                if(!isset($_SESSION['user_email'])){?>

                    <li class="nav-item">
                        <a href="<?php echo BASE_URL.'user/register' ?>" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL.'user/login' ?>" class="nav-link">Login</a>
                    </li>

                    <?php }
                        else{ ?>

                    <li class="nav-item">
                        <a href="<?php echo BASE_URL.'user/logout' ?>" class="nav-link">LogOut</a>
                    </li>


                    <div class="btn-group dropstart dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php $path_img = '../img/default.png' ; 
                        if(HelpersFunction::getCurrentMethod() != 'index'){
                            if(HelpersFunction::getCurrentMethod() == 'show')
                                $path_img = '../../img/default.png' ; 
                            else
                            $path_img = '../img/default.png' ; 
                        }
                        ?>
                            <img src="<?php echo $path_img ?>" style="border-radius: 50%;" width="40" height="40" alt=""
                                class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <li><a class="dropdown-item" href="">Edit Profil </a></li>
                            <li><a class="dropdown-item" href="">Change Password</a></li>
                        </ul>
                    </div>

                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>