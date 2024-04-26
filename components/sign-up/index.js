function checkLogin() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let formData = {
        email: email,
        password: password
    };

    console.log(formData);
}
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    // Your form submission handling code here
});
