<?php 
    include 'config.php';
     if(isset($_GET['uid'])){
        $uid = mysqli_real_escape_string($con,$_GET['uid']);
    if(!empty($uid)){ 
    class getaddress{
        public function get($getquery){
            foreach($getquery as $array){
                $list[] = [
                             'addressid' => $array['id'],
                             'address' => $array['location'],
                             'flatno' => $array['flatno'],
                             'landmark' => $array['landmark'],
                             'pincode' => $array['pincode'],
                             'city' => $array['city'],
                             'state' => $array['state'],
                             'addresstype' => $array['addtype'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new getaddress();
    echo $output->get(mysqli_query($con,"SELECT * FROM `address1` WHERE `status` = 'active' AND `uid` = '$uid'"));
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
