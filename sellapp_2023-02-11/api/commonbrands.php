<?php 
    include 'config.php';
     if(isset($_POST['cid'])){
        $cid = $_POST['cid'];
    if(!empty($cid)){ 
    class mobbrand{
        public function getbrand($getquery){
            foreach($getquery as $array){
                $list[] = [
                              'url' => 'https://sellit.co.in/sellapp/oldmobile.php?id='.$array['id'],
                             'file' => 'https://sellit.co.in/admin/img/'.$array['subcategory_image'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = $cid"));
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
