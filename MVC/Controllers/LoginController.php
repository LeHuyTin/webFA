<?php
require_once './MVC/Models/UserModel.php';

class LoginController
{
    private $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        // Kiểm tra nếu đã đăng nhập thì chuyển về trang chủ
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php');
            exit();
        }

        // Hiển thị login page trực tiếp không dùng layout
        include './MVC/Views/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            // Validation
            if (empty($username) || empty($password)) {
                $error = "Vui lòng nhập đầy đủ thông tin!";
            } else {
                // Kiểm tra thông tin đăng nhập với database
                $user = $this->userModel->login($username, $password);
                if ($user) {
                    // Đăng nhập thành công
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['full_name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    // Chuyển hướng về trang chủ hoặc trang trước đó
                    $redirect = $_SESSION['redirect_after_login'] ?? 'index.php';
                    unset($_SESSION['redirect_after_login']);
                    header('Location: ' . $redirect);
                    exit();
                } else {
                    $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                }
            }
            // Hiển thị lại form với lỗi
            include './MVC/Views/login.php';
        }
    }
    
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => trim($_POST['username'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'password' => $_POST['password'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? '',
                'full_name' => trim($_POST['full_name'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'address' => trim($_POST['address'] ?? '')
            ];
            $errors = [];
            // Validation
            if (empty($data['username'])) {
                $errors[] = "Tên đăng nhập không được để trống!";
            } elseif ($this->userModel->checkUsernameExists($data['username'])) {
                $errors[] = "Tên đăng nhập đã tồn tại!";
            }
            if (empty($data['email'])) {
                $errors[] = "Email không được để trống!";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ!";
            } elseif ($this->userModel->checkEmailExists($data['email'])) {
                $errors[] = "Email đã tồn tại!";
            }
            if (empty($data['password'])) {
                $errors[] = "Mật khẩu không được để trống!";
            } elseif (strlen($data['password']) < 6) {
                $errors[] = "Mật khẩu phải có ít nhất 6 ký tự!";
            }
            if ($data['password'] !== $data['confirm_password']) {
                $errors[] = "Mật khẩu xác nhận không khớp!";
            }
            if (empty($errors)) {
                // Đăng ký thành công
                if ($this->userModel->register($data)) {
                    $success = "Đăng ký thành công! Vui lòng đăng nhập.";
                    // Hiển thị form login với thông báo thành công
                    include './MVC/Views/login.php';
                    return;
                } else {
                    $errors[] = "Có lỗi xảy ra khi đăng ký. Vui lòng thử lại!";
                }
            }
            // Hiển thị form với lỗi
            $error = implode('<br>', $errors);
            include './MVC/Views/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
    public function profile()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_after_login'] = 'index.php?url=login/profile';
            header('Location: index.php?url=login');
            exit();
        }
        
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'full_name' => trim($_POST['full_name'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'address' => trim($_POST['address'] ?? '')
            ];
            
            if ($this->userModel->updateUser($_SESSION['user_id'], $data)) {
                $success = "Cập nhật thông tin thành công!";
                $_SESSION['full_name'] = $data['full_name'];
                $_SESSION['email'] = $data['email'];
                $user = array_merge($user, $data);
            } else {
                $error = "Có lỗi xảy ra khi cập nhật thông tin!";
            }
        }
        
        // Tạo nội dung cho view profile (vẫn dùng layout cho profile)
        ob_start();
        include './MVC/Views/profile.php';
        $content = ob_get_clean();
        include './MVC/Views/layout.php';
    }
    
    public function changePassword()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?url=login');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            
            $errors = [];
            
            // Validation
            if (empty($currentPassword)) {
                $errors[] = "Vui lòng nhập mật khẩu hiện tại!";
            }
            
            if (empty($newPassword)) {
                $errors[] = "Vui lòng nhập mật khẩu mới!";
            } elseif (strlen($newPassword) < 6) {
                $errors[] = "Mật khẩu mới phải có ít nhất 6 ký tự!";
            }
            
            if ($newPassword !== $confirmPassword) {
                $errors[] = "Mật khẩu xác nhận không khớp!";
            }
            
            if (empty($errors)) {
                // Kiểm tra mật khẩu hiện tại
                $user = $this->userModel->getUserById($_SESSION['user_id']);
                if ($user && password_verify($currentPassword, $user['password'])) {
                    // Đổi mật khẩu
                    if ($this->userModel->changePassword($_SESSION['user_id'], $newPassword)) {
                        $success = "Đổi mật khẩu thành công!";
                    } else {
                        $error = "Có lỗi xảy ra khi đổi mật khẩu!";
                    }
                } else {
                    $error = "Mật khẩu hiện tại không đúng!";
                }
            } else {
                $error = implode('<br>', $errors);
            }
        }
        
        // Redirect về profile với thông báo
        header('Location: index.php?url=login/profile' . 
               (isset($success) ? '&success=' . urlencode($success) : '') .
               (isset($error) ? '&error=' . urlencode($error) : ''));
        exit();
    }
    
    public function forgot()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            if (empty($email)) {
                $forgot_error = "Vui lòng nhập email!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $forgot_error = "Email không hợp lệ!";
            } else {
                if ($this->userModel->checkEmailExists($email)) {
                    // TODO: Gửi email reset password
                    $forgot_success = "Liên kết đặt lại mật khẩu đã được gửi đến email của bạn!";
                } else {
                    $forgot_error = "Email không tồn tại trong hệ thống!";
                }
            }
            // Hiển thị lại form
            include './MVC/Views/login.php';
        }
    }
}
