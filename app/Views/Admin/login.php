<!doctype html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="newassets/css/style.css">
<link rel="icon" href="assets/img/logo.png" type="image/x-icon">


</head>

<body>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(assets/img/logo.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        
                                    </p>
                                </div>
                            </div>
                            <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                            <form action="<?php echo base_url(); ?>/UserController/loginAuth" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                
                            </form>
                            <!-- <p class="text-center">Not a member? <a href="?= base_url('/regindex') ?>">Sign Up</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="newassets/js/jquery.min.js"></script>
    <script src="newassets/js/popper.js"></script>
    <script src="newassets/js/bootstrap.min.js"></script>
    <script src="newassets/js/main.js"></script>

</body>

</html>