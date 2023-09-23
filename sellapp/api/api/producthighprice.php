<?php 
    include 'config.php';
     if(isset($_POST['mid'])){
        $mid = $_POST['mid'];
    if(!empty($mid)){ 
    class mobbrand{
        public function getbrand($getquery){
            foreach($getquery as $array){
                $list = [
                              'price' => $array['price'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT MAX(uptovalue) AS price FROM `varient` WHERE `status` = 'active' AND `product_name` = $mid"));
 }else{
         $list = [
                'status' => '0',
                'message' => 'please pass the value'
            ];
            echo json_encode($list);
    }
    }else{
        $list = [
                'status' => '0',
                'message' => 'method should be post'
            ];
            echo json_encode($list);
    }
?>
