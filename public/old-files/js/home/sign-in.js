function togglePasswordVisibility(ele) {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        ele.classList.remove("fa-eye-slash");
        ele.classList.add("fa-eye");
        ele.classList.remove("opacity-50");
    } else {
        x.type = "password";
        ele.classList.remove("fa-eye");
        ele.classList.add("fa-eye-slash");
        ele.classList.add("opacity-50");
    }
}