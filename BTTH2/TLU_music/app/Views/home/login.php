<?php
// Không cho người dùng thay đổi url  mà chưa thực hiện đăng nhập

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('../admin/navbar.php');
        ?>
        <div class="row w-100" style="position: absolute; top:120px;">
            <div class="row w-100" id="login_content">
                <div class="col vh-100" style="position: relative;">
                    <div id="form-icon">
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-google"></i>
                        <i class="bi bi-twitter"></i>
                    </div>
                    <div id="form_login" style="position: absolute;">
                        <form action="../../Controller/UserController.php?action=login" method="post">
                            <p style="font-size: 40px;">Sign In</p>
                            <hr>
                            <div id="liveAlertPlaceholder"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <p>Remember Me</p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning mb-5">Sign in</button>
                            </div>

                            <div class="text-center c-warning">
                                <hr>
                                <p>Don't have an account? <a href="register.php?action=register">Sign Up</a></p>
                                <p><a href="#">Forgot your password?</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="col vw-100" style="position: absolute; bottom:0;">
                        <hr>
                        <h4 style="text-align:center">TLU'S MUSIC GARDEN</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/toastr.min.js"></script>
<script>
    const success = 'https://codepen.io/uxjulia/pen/a35d3ea1688ec7d933f257f9ffa67116.html'
    <?php if(isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
       toastr.success('Login successful!', 'Success');
    //    $success = $_GET['success'];
     <?php else: ?>
        toastr.error('Login failed!', 'Error');
    <?php endif; ?>
   
    
    function showToastr(type, title, message) {
    let body;
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 0,
        "onclick": null,
        "onCloseClick": null,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    switch(type){
        case "info": body = "<span> <i class='fa fa-spinner fa-pulse'></i></span>";
            break;
        default: body = '';
    }
    const content = message + body;
    toastr[type](content, title)
}
</script>

