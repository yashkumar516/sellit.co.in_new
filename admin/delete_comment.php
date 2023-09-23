<?php include 'includes/confile.php' ?>
<?php 
 $cid = $_REQUEST['id'];
 $blog = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `blogcomments` WHERE `id` = '$cid' "));
 $blogid = $blog['blogid'];
 $deletequery = mysqli_query($con,"DELETE FROM `blogcomments` WHERE `id` = '$cid' ");
 if($deletequery)
 {
    echo " <script>
     alert('delete successfully');
     window.location.href = 'blog_comment.php?id=$blogid';
     </script>";
 }
 else{
    echo " <script>
    alert('not delete');
    window.location.href = 'blog_comment.php?id=$blogid';
    </script>";
 }
?>