<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var togglePasswordButton = document.querySelector('#show_hide_password a');
    var passwordField = document.querySelector('#show_hide_password input');
    var icon = document.querySelector('#show_hide_password i');

    togglePasswordButton.addEventListener('click', function(event) {
        event.preventDefault();

        if (passwordField.type === 'text') {
            passwordField.type = 'password';
            icon.classList.add('fa-eye-slash');
            icon.classList.remove('fa-eye');
        } else if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});
</script>
</body>
</html>