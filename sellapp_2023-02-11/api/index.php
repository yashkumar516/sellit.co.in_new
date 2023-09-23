<?php 
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include 'config.php';

    class homebanner{
        public function getbanner($getquery){
            foreach($getquery as $array){
                $bannerlist[] = [
                             'file' => 'https://sellit.co.in/admin/img/'.$array['image'],
                    ];
                    $array = $bannerlist;
            }
            return json_encode($array);
        }
    } 
    $output = new homebanner();
    echo $output->getbanner(mysqli_query($con,"SELECT * FROM `homebanner` WHERE `status` = 'active' "));

?>
