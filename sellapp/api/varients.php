<?php 
    include 'config.php';
    if(isset($_POST['mid'])){
        $mid = mysqli_real_escape_string($con,$_POST['mid']);
    if(!empty($mid)){ 
    class varient{
        public function getvarient($getquery){
            foreach($getquery as $array){
                $list[] = [
                              'vid' => $array['id'],
			      'vname' => $array['varient'],
			      'price' => $array['uptovalue'],
                    ];
            
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new varient();
    echo $output->getvarient(mysqli_query($con,"SELECT * FROM `varient` WHERE `product_name` = '$mid' And `status` = 'active'"));
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

