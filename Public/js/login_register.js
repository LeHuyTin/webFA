const zform = document.querySelector(".zform");
const loginlink = document.querySelector(".login_link");
const registerlink = document.querySelector(".register_link");
const forgotlink = document.querySelector(".forgot_link");
const back_login = document.querySelector(".back_login");

// hiển thị form đăng ký
registerlink.addEventListener("click", () => {
  zform.classList.add("active");
  resetLoginForm();
});

// hiển thị form đăng nhập
loginlink.addEventListener("click", () => {
  zform.classList.remove("active");
  resetRegisterForm();
});

// hiển thị form quên mật khẩu
forgotlink.addEventListener("click", () => {
  zform.classList.add("forgot");
  resetLoginForm();
});

// quay lại form đăng nhập
back_login.addEventListener("click", () => {
  zform.classList.remove("forgot");
  resetForgotForm();
});

// reset form
function resetLoginForm() {
  const loginForm = document.querySelector(".login_form form");
  loginForm.reset();
}

function resetRegisterForm() {
  const registerForm = document.querySelector(".register_form form");
  registerForm.reset();
}

function resetForgotForm() {
  const forgotForm = document.querySelector(".forgot_form form");
  forgotForm.reset();
}

// hiển thị hoặc ẩn mật khẩu
function togglePasswordVisibility(button) {
  var targetId = button.getAttribute("data-target");
  var passwordInput = document.getElementById(targetId);
  var passwordToggle = button.querySelector("i");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggle.classList.remove("fa-eye-slash");
    passwordToggle.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    passwordToggle.classList.remove("fa-eye");
    passwordToggle.classList.add("fa-eye-slash");
  }
}

// Alert: Tự động ẩn alert-danger và alert-success sau 3 giây (hiển thị global)
document.addEventListener("DOMContentLoaded", function () {
  const alerts = document.querySelectorAll(".alert-danger, .alert-success");
  if (alerts.length > 0) {
    setTimeout(function () {
      alerts.forEach(function (alert) {
        alert.style.display = "none";
      });
    }, 3000);
  }
});

// Toggle password
function toggleRegisterPasswords(button) {
  var passwordInput = document.getElementById("password-register");
  var confirmInput = document.getElementById("repassword");
  var passwordToggle = button.querySelector("i");
  var isHidden = passwordInput.type === "password";
  if (isHidden) {
    passwordInput.type = "text";
    confirmInput.type = "text";
    passwordToggle.classList.remove("fa-eye-slash");
    passwordToggle.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    confirmInput.type = "password";
    passwordToggle.classList.remove("fa-eye");
    passwordToggle.classList.add("fa-eye-slash");
  }
}
