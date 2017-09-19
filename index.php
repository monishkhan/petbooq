<form method="POST" class="res-form">
    <?php // echo $posts ?>
    <input type="text" name="postid" value="97">
    <input type="text" name="userid" value="24580">
    <input type="text" name="username">
    <input type="submit" name="sub" value="submit" class="sub">
</form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $(".sub").click(function (e) {
                                    e.preventDefault()
                                    var form = $(".res-form").serialize();
                                    $.ajax({
                                        url: 'postinsert.php',
                                        data: form,
                                        type: "POST",
                                        success: function (data) {
                                            alert(data);
                                        }
                                    });
                                    alert("Not submit");
                                });
                            });
                        </script>