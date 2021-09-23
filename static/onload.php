<script>
    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                method: "GET",
                url: "messages/check_new_messages.php?to=<?php echo $_SESSION['result']; ?>",
                success: function (data, textStatus, jqXHR) {
                    $('#nbr_msg').text(parseInt(data));
                }
            });
        }, 1000);
    });
</script>