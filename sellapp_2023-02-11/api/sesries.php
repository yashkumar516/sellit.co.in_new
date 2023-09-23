<?php 
    include 'config.php';
     if(isset($_POST['bid'])){
        $bid = $_POST['bid'];
    if(!empty($bid)){ 
    class mobbrand{
        public function getbrand($getquery,$bid){
            foreach($getquery as $array){
                $list[] = [
                              'seriesid' => $array['id'],
                              'bid' => $bid,
                              'catid' => $array['categoryid'],
                             'name' => $array['childcategory'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `childcategory` WHERE `status` = 'active' AND `subcatid` = $bid"),$bid);
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
