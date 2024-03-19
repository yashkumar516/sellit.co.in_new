<?php 
    include 'config.php';
    class sellmobile{
        public function getmobile($getquery,$publicUrl){
                    $list = mysqli_fetch_assoc($getquery);
                    $listing = ['file'=>$publicUrl.'admin/img/'.$list['banner_image'],'title'=>$list['title']];
                    $array = $listing;
            return json_encode($array);
        }
    } 
    $output = new sellmobile();
    echo $output->getmobile(mysqli_query($con,"SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Sell Phone' "),$publicUrl);
?>