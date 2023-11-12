<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (e) {
            if ($("#username").val() === "" || $("#password").val() === "") {
                alert("Username and password are required");
                e.preventDefault();
            }
        });
    });
</script>
