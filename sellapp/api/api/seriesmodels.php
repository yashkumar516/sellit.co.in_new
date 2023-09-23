<?php 
    include 'config.php';
     if(isset($_POST['bid']) && isset($_POST['sid']) && isset($_POST['cid'])){
        $bid = $_POST['bid'];
        $sid = $_POST['sid'];
        $cid = $_POST['cid'];
    if(!empty($bid)){ 
    class mobbrand{
        public function getbrand($getquery,$bid){
            foreach($getquery as $array){
                $catid = $array['categoryid'];
                if($catid == 1){
                $list[] = [   
                             'url' => "https://sellit.co.in/sellapp/variant.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 3){
                     $list[] = [   
                             'url' => "https://sellit.co.in/sellapp/tabletsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 2){
                     $list[] = [   
                             'url' => "https://sellit.co.in/sellapp/watchsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 4){
                     $list[] = [   
                             'url' => "https://sellit.co.in/sellapp/earpodsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                             'name' => $array['product_name'],
                    ];
                }else{
                     $list[] = [   
                             'url' => "https://sellit.co.in/sellapp/404.php",
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                             'name' => $array['product_name'],
                    ];
                }
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' AND `subcategoryid` = '$bid' AND `categoryid` = '$cid' AND `childcategoryid` = '$sid' ORDER BY `product_name` ASC"),$bid);
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
