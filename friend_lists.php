<form method="POST" id="res-form">
    <input type="text" name="postid" value="80"><!--post id post on wall--> 
    <input type="text" name="user_id" value="2180"><!--user id post on wall--> 
    <input type="text" name="username">
    <input type="submit" name="sub" value="submit" id="sub">
</form>
<p class="result"></p>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script> 
<script>
    $(function () {
        $("#sub").click(function (e) {
            e.preventDefault();
            var form = $("#res-form").serialize();
            $.ajax({
                url: 'postinsert.php',
                data: form,
                type: 'POST',
                success: function (data) {
                $(".result").html(data);
                }
            });
        });
    });
</script>