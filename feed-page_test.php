<html>
    <?php require_once 'inc/head-content.php'; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <body>
        <?php require_once 'inc/header.php'; ?>

        <?php
        session_start();
        if(!isset($_SESSION["pet_unique_id"]))
        {
            session_destroy();
            header("Location:admin_login.php");
        }
        else{
//print_r($_SESSION);
        $parent_id = $_SESSION["pet_unique_id"];
//$child_id = $_SESSION["child_user_id"];
        
        require './dbcon.php';
//$display = "SELECT * FROM `addfriends` JOIN user_inf on addfriends.child_id = user_inf.pet_unique_id WHERE addfriends.parent_id ='$parent_id'";
        $display = "SELECT * FROM addfriends JOIN user_inf ON addfriends.child_id=user_inf.pet_unique_id JOIN post on post.child_post_id = addfriends.child_id WHERE addfriends.parent_id = '$parent_id'"; ///fetch data from database child id post comment
        $result = mysqli_query($conn, $display);
        if (mysqli_num_rows($result)) {
            ?>
            <div class="main-content">
                <div class="main-content-inn col-three main-content-full usr-feed-page">
                    <div class="main-content-inn-left">
                        <div class="col-first">
                            <div class="stat-textarea post-f">

                                <div class="uplbtn-btm">
                                    <h2 class="p-hdng">Share your new experience</h2>
                                    <div class="upl-btm-text"><input placeholder="Experience" type="text"></div>
                                    <div class="upl-btm-text"><textarea placeholder="Share your pets"></textarea></div>
                                </div>
                                <div class="upload-btn uplbtn-top uplbtn-btm-t">
                                    <div class="upload-btn-hld">
                                        <input placeholder="Type your URL" class="typ-t" type="text">
                                    </div>
                                    <div class="upload-btn-hld upload-btn-hld-top">
                                        <input value="upload" class="fl-img" type="file">
                                        <input class="fl-upld" value="upload" type="submit"><a href="#" class="ad-m">+</a> <input value="Post" class="fl-subm" type="submit">
                                    </div>
                                </div>
                            </div>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="two-col-post">
                                    <div class="left">
                                        <div class="post-in-c">
                                            <div class="post-image">
                                                <a class="example-image-link" data-lightbox="example-1" data-title=" <p><?php echo $row["pet_name"] . '-' . $row["child_id"] . '-' . $row["post_id"] ?></p>" href="images/user_image08.jpg" data-lightbox="example-1">
                                                    <img class="example-image" src="images/user_image08.jpg" alt="image-1" />
                                                     
                                                </a>

                                            </div>
                                            <div class="post-content">
                                                <h2><span class="user-icn-img"><img src="images/user-img-icon.png" alt="user image" /></span><p class="user-nm"><a href="#"><?php echo $row["pet_name"] . '-' . $row["child_id"] . '-' . $row["post_id"] ?></a></p></h2>
                                                <p class="pst-text"><?php echo $row["posts"] ?><p>
                                                    <!--<p class="pst-text"><?php //echo $row["post_id"]             ?><p>-->
                                                <p class="ttl-lks"><a href="#">435 likes</a></p>
                                            </div>

                                            <div class="post-act-btn result">
                                                <div class="post-act-ins">
                                                    <a href="#" title="">like</a>
                                                    <a href="#" title="">Comment</a>
                                                    <a href="#" title="">Share</a>
                                                </div>

                                                <?php
                                                $posts = $row["post_id"];
                                                $show_comments = "SELECT * FROM post JOIN comments ON comments.comment_post_id = post.post_id WHERE post.post_id =$posts";
                                                $result_comments = mysqli_query($conn, $show_comments);
                                                if ($posts == true) {
                                                    if (mysqli_num_rows($result_comments)) {
                                                        while ($row = mysqli_fetch_assoc($result_comments)) {
                                                            echo "<h3>" . $row["comment"] . "</h3>";
                                                        }
                                                    }
                                                }
                                                ?>

                                            </div>
                                          

                                            <form method="POST" class="res-form">
                                                <?php echo $posts ?>
                                                <input type="text" name="postid" value="<?php echo $posts ?>">
                                                <input type="text" name="userid" value="<?php echo $parent_id; ?>">
                                                <input type="text" name="username">
                                                <input type="submit" name="sub" value="submit" class="sub">
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <?php
                            }
                        }
        }
                        ?>
                    </div>

                    <div class="col-second">
                        <div class="fr-list">
                            <h2 class="fr-headnig"><span class="user-icn-img"><a href="#">
                                        <img src="images/fr-li-icon.png" alt="user image"></a>
                                </span><p class="user-nm"><a href="#">Friend List</a></p></h2>
                            <div class="fr-li-cont">
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#">Add Friend</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#">Add Friend</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#">Add Friend</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#">Add Friend</a></p></div>
                                </div>
                            </div>
                        </div>

                        <div class="fr-list fr-req">
                            <h2 class="fr-headnig"><span class="user-icn-img"><a href="#">
                                        <img src="images/fr-req-icon.png" alt="user image"></a>
                                </span><p class="user-nm"><a href="#">Friend Request</a></p></h2>
                            <div class="fr-li-cont">
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="inv-icon"><img src="images/fr-inv-icon.png" alt=""></a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="inv-icon"><img src="images/fr-inv-icon.png" alt=""></a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="inv-icon"><img src="images/fr-inv-icon.png" alt=""></a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="inv-icon"><img src="images/fr-inv-icon.png" alt=""></a></p></div>
                                </div>
                            </div>
                        </div>


                        <div class="fr-list fr-sug">
                            <h2 class="fr-headnig"><span class="user-icn-img"><a href="#">
                                        <img src="images/fr-sug-icon.png" alt="user image"></a>
                                </span><p class="user-nm"><a href="#">Friend Suggestion </a></p></h2>
                            <div class="fr-li-cont">
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="dlt-icn">X</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="dlt-icn">X</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="dlt-icn">X</a></p></div>
                                </div>
                                <div class="fr-li-row">
                                    <div class="fr-t-l">
                                        <a href="#"><span class="user-icn-img"><img src="images/fr-img-icon.png" alt="user image"><span class="fr-nm">Friend Name</span></span></a>
                                    </div>
                                    <div class="user-nm"><a href="#" class="dlt-icn">X</a></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pro-right-sec">
                    <div class="sidebar">
                        <ul>
                            <li><a href="#"><span class="icn"><img src="images/create-page-icon.png" alt="icon" /></span>Create Page</a></li>
                            <li><a href="#"><span class="icn"><img src="images/create-grp-icon.png" alt="icon" /></span>Create Groups</a></li>
                            <li><a href="#"><span class="icn"><img src="images/event-icon.png" alt="icon" /></span>Events</a></li>
                            <li><a href="#"><span class="icn"><img src="images/create-grp-icon.png" alt="icon" /></span>Create Ads</a></li>
                            <li><a href="#"><span class="icn"><img src="images/notes-icon.png" alt="icon" /></span>Create Notes</a></li>
                            <li><a href="#"><span class="icn"><img src="images/rec-icon.png" alt="icon" /></span>Recommendations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                $('form').on('submit', function (e) {
                    $.ajax({
                        type: 'post',
                        url: 'postinsert.php',
                        data: $(this).serialize(),
                        success: function (data) {
                          location.reload();
                        
                        }
                    });
                    e.preventDefault();
                });
            });
        </script>
        <?php require_once 'inc/footer.php'; ?>
    </body>
</html>