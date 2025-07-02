<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Font/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="./Public/css/login.css">
    <title>FA-shion - Đăng nhập</title>
</head>
<body>
    <!-- ALERT GLOBAL -->
    <?php if (isset($forgot_error)): ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-exclamation-circle"></i>
            <?php echo $forgot_error; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($forgot_success)): ?>
        <div class="alert alert-success">
            <i class="fa-solid fa-check-circle"></i>
            <?php echo $forgot_success; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($error) && !isset($_POST['register'])): ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-exclamation-circle"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <i class="fa-solid fa-check-circle"></i>
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($error) && isset($_POST['register'])): ?>
        <div class="alert alert-danger">
            <i class="fa-solid fa-exclamation-circle"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <!-- END ALERT GLOBAL -->
    <div class="zform">
        <div class="close_btn">
            <a href="index.php"><i class="fa-solid fa-x"></i></a>
        </div>

        <!-- Forgot Password Form -->
        <div class="forgot_form">
            <h2>Đặt lại mật khẩu</h2>
            <form action="index.php?url=login/forgot" method="post">
                <div class="mb-3">
                    <i class="fa-solid fa-envelope"></i> 
                    <label for="email" class="form-label">Email đã đăng kí</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                </div>
                <button id="submit_btn" type="submit" class="btn btn-primary">Gửi</button>
            </form>
            <div class="back_login">
                <i class="fa-solid fa-arrow-left-long"></i>
            </div>
        </div>

        <!-- Login Form -->
        <div class="login_form">
            <h2>Đăng nhập</h2>
            <form action="index.php?url=login/login" method="post">
                <div class="mb-3">
                    <i class="fa-solid fa-user"></i> 
                    <label for="username" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-lock"></i> 
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="password-container">
                        <input type="password" class="form-control" id="password-login" name="password" required>
                        <button type="button" class="toggle-password" data-target="password-login" onclick="togglePasswordVisibility(this)">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="save_pass">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    <div class="forgot">
                        <a href="#" class="forgot_link">Quên mật khẩu?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
            <div class="login_register">
                <p>Bạn chưa có tài khoản? <a href="#" class="register_link">Đăng ký ngay</a></p>
            </div>
        </div>

        <!-- Register Form -->
        <div class="register_form">
            <h2>Đăng ký</h2>
            <form action="index.php?url=login/register" method="post">
                <input type="hidden" name="register" value="1">
                <div class="mb-3">
                    <i class="fa-solid fa-user"></i> 
                    <label for="full_name" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-user"></i> 
                    <label for="reg_username" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="reg_username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-envelope"></i> 
                    <label for="reg_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="reg_email" name="email" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-lock"></i> 
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="password-container">
                        <input type="password" class="form-control" id="password-register" name="password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-lock"></i> 
                    <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                    <div class="password-container">
                        <input type="password" class="form-control" id="repassword" name="confirm_password" required>
                        <button type="button" class="toggle-password" onclick="toggleRegisterPasswords(this)">
                            <i class="fa-solid fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
            <div class="login_register">
                <p>Bạn đã có tài khoản? <a href="#" class="login_link">Đăng nhập ngay</a></p>
            </div>
        </div>
    </div>

    <script src="./Public/js/login_register.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const zform = document.querySelector(".zform");
            
            // Hiển thị register form nếu có lỗi đăng ký
            <?php if (isset($error) && isset($_POST['register'])): ?>
                zform.classList.add("active");
            <?php endif; ?>
            
            // Hiển thị forgot form nếu có lỗi forgot
            <?php if (isset($forgot_error) || isset($forgot_success)): ?>
                zform.classList.add("forgot");
            <?php endif; ?>
        });
    </script>
</body>
</html>
