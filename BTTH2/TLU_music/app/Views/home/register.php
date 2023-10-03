<?php 
    //Lâý error của trang web
    if(isset($_GET['error']) && !empty($_GET['error'])){
        $error = $_GET['error'];
    }else{
        $error ="";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<style>

    .row, .row>*{
    padding: 0;
    margin: 0;
}
a:-webkit-any-link{
    font-weight: bold;
}
.posts{
    border: 1px solid #d4d4d4;
    border-radius: 10px;
}
.posts a{
    text-decoration: none;
    font-weight: 600;
    color: #2185e1;
}
.posts>p{
    margin-top:20px;
    margin-bottom:20px;
}
hr {
    border-style: solid; /* Äáº·t kiá»ƒu Ä‘Æ°á»ng viá»n thÃ nh Ä‘á»©ng */
    border-width: 2px; /* Äáº·t Ä‘á»™ dÃ y Ä‘Æ°á»ng viá»n */
}
#detail-content{
    padding: 50px;
    box-shadow: inset 3px 17px 3px rgba(0, 0, 0, 0.1);
}
#form_login{
    width: 500px;
    height: 550px;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 1%;
    background-color: #7f7f7f;
    border-radius: 5px;
}
#form_login >form p{
    color: white;
    
}
#form_login >form a{
    color: rgb(207, 200, 4);
    text-decoration: none;
    
}
#form-icon{
    position: absolute;
    color: #ffc312;
    font-size: 50px;
    top: 2%;
    left: 52%;
    z-index: 1;
}
#admin_content{
    padding: 80px;
    box-shadow: inset 3px 17px 3px rgba(0, 0, 0, 0.1);
}
#login_content{
    box-shadow: inset 3px 17px 3px rgba(0, 0, 0, 0.1);
}
</style>
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
                        <form action="../../Controller/UserController.php?action=register" method="post">
                            <p style="font-size: 40px;">Register</p>
                            <hr>
                            <div id="liveAlertPlaceholder"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                            </div>
                            <span id="usernameError" class="text-danger">
                                <?php if(isset($error) && $error == 'username_taken' || $error == 'email_user') 
                                {echo "Tên đăng nhập đã tồn tại";} ?>
                            </span>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="gmail" name="gmail">
                            </div>
                            <span id="emailError" class="text-danger"><?php
                             if(isset($error) && $error == 'email_taken' || $error == 'email_user') {echo "Tên tài khoản gmail đã được đăng ký";} 
                             ?></span>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>

                            <!-- <div class=" form-check p-0" style="font-size:10px;">
                                <p>Mật khẩu ít nhất 8 ký tự gồm ít 1 chữ hoa, 1 ký tự đặc biệt và 1 số.</p>
                            </div> -->

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="retype password" name="retype_password">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name = 'agreeTerm'>
                                <p>Tôi đồng ý với chính sách và điều khoản</p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning mb-5">Register</button>
                            </div>

                            <div class="text-center c-warning">
                                <hr>
                                <p>Do you have an account? <a href="login.php">Sign In</a></p>
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
<script>
    // Lấy các phần tử input và thông báo lỗi tương ứng
    var usernameInput = document.querySelector('input[name="username"]');
    var usernameError = document.getElementById('usernameError');
    var emailInput = document.querySelector('input[name="gmail"]');
    var emailError = document.getElementById('emailError');

    // Bắt sự kiện focus trên ô input
    usernameInput.addEventListener('focus', function () {
        // Tắt thông báo lỗi
        usernameError.style.display = 'none';
    });

    emailInput.addEventListener('focus', function () {
        emailError.style.display = 'none';
    })

    // Tương tự, bạn có thể thêm các sự kiện cho các ô input khác
</script>

