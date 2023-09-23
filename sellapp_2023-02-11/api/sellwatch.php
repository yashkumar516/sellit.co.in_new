<?php 
    include 'config.php';
    class sellwatch{
        public function getwatch($getquery){
                    $list = mysqli_fetch_assoc($getquery);
                    $listing = ['file'=>'https://sellit.co.in/admin/img/'.$list['banner_image'],'title'=>$list['title']];
                    $array = $listing;
            return json_encode($array);
        }
    } 
    $output = new sellwatch();
    echo $output->getwatch(mysqli_query($con,"SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Watch' "));
?>
