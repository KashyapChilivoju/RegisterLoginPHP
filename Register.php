<html>
<body>

<form id="registerForm">
    Name: <input type="text" id="name">
    E-mail: <input type="text" id="email">
    Mobile: <input type="number" id="mobile">
    Password: <input type="password" id="password"><br><br>
    Gender:
    <input type="radio" id="male" name="gender" value="male"> Male
    <input type="radio" id="female" name="gender" value="female"> Female<br><br>
    <input type="submit">
</form>

<script>
    // Function to capture form data and store it in localStorage
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission to server

        // Capture form data
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var mobile = document.getElementById('mobile').value;
        var password = document.getElementById('password').value;
        var gender = document.querySelector('input[name="gender"]:checked')?.value;

        // Storing the data in localStorage
        localStorage.setItem('name', name);
        localStorage.setItem('email', email);
        localStorage.setItem('mobile', mobile);
        localStorage.setItem('password', password);
        localStorage.setItem('gender', gender);

        // Optional: Display a confirmation message or redirect
        alert('User data stored in localStorage!');
    });
</script>

</body>
</html>