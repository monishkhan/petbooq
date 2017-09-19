<?php
session_start();
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $_SESSION["child_user_id"] = 24540;
    $id = $_SESSION["child_user_id"];
    require './dbcon.php';
    $query_insert = "INSERT INTO `post`(`child_post_id`, `posts`) VALUES ('$id','$description')";
    mysqli_query($conn, $query_insert);
    $_SESSION["child_user_id"];
//    header("Location:feed-page.php");
}
?>
<?php require_once 'inc/head-content.php'; ?>
<body>
    <?php require_once 'inc/header.php'; ?>

    <div class="main-content">
        <div class="main-content-inn col-three post-page">
            <div class="main-content-inn-left main-content-full">
                <div class="col-first">
                    <div class="stat-textarea post-f">
                        <form method="post" id="postform">
                            <div class="uplbtn-btm">
                                <h2>Share your new experience</h2>
                                <div class="upl-btm-text"><input type="text" name="title"  id ="heading" placeholder="Enter a title for the post">
                                </div>
                                <div class="upl-btm-text"><textarea name="description" name = "description" id="description" class="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="upload-btn uplbtn-top uplbtn-btm-t">
                                <div class="upload-btn-hld upload-btn-hld-top upload-btn-hld">
                                    <P class="upl-t">Upload File:</P> <input type="file" class="fl-img" name="post_image" id="postimage">
                                </div>
                                <div class="upload-btn-hld "><input type="text" value="http://" name="addlink" placeholder="Add Link" class="typ-t"></div>
                                <div class="upload-btn-hld-sub">
                                    <input type="submit" value="POST" class="fl-subm" name="submit" onclick="return submit()">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>