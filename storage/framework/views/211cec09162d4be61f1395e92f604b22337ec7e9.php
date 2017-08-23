<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LOGIN PAGE</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(URL::asset('')); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(URL::asset('')); ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(URL::asset('')); ?>css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(URL::asset('')); ?>css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(URL::asset('')); ?>css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?php if($message = Session::get('fail')): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(URL::asset('')); ?>admin/log-in" method="post">
                    <h1>Login Form</h1>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        
                            
                        

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> HBB Solutions Company</h1>
                            <p>©2017 All Rights Reserved. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>


    </div>
</div>
</body>
</html>
