<?php 
    include 'config.php';
    class reviews{
        public function getreiviews($getquery){
            foreach($getquery as $array){
                $list[]=['name'=>$array['rname'],'city'=>$array['rcity'],'message'=>$array['rmsg']];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new reviews();
    echo $output->getreiviews(mysqli_query($con,"SELECT * FROM `product_reviews` WHERE `status` = 'active'"));
?>
