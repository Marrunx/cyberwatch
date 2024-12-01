function togglePassword() {
    const adminPw = document.getElementById("adminPw");
    const confirmPw = document.getElementById("confirmPw");
    const showPasswordCheckbox = document.getElementById("showPass");

    if (showPasswordCheckbox.checked) {
        adminPw.type = "text";
        confirmPw.type = "text";
    } else {
        adminPw.type = "password";
        confirmPw.type = "password";
    }
}
