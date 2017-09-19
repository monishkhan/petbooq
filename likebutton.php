<?php
$_SESSION['user_id'] = (int)1; ///user id
require_once './dbcon.php';
$query = "select articles.id,articles.title from articles";
//$query = "select articles.id,articles.title from articles join article_like on article_like.article = articles.id join user on user.id = article_like.user group by articles.id";
//print_r($query);
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result))
{
   echo '<pre>'; 
//   echo $row['id']; 
   echo $row['title'];
   echo '<a href="likebutton.php?type=article&id='.$row["id"].'">Like</a>';
   echo '</pre>';
}

if(isset($_GET["type"],$_GET["id"]))
{
    $type = $_GET["type"];
    $id = $_GET["id"];
    if($type=="article")
    {
        print_r($id);
        print_r($type);
    }
  
}

?>