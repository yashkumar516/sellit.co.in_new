<?php 
    include 'config.php';
    if(isset($_POST['cid'])){
        $cid = $_POST['cid'];
    if(!empty($cid)){ 
    class topmobile{
        public function getmobile($getquery){
            foreach($getquery as $array){
                 $catid = $array['categoryid'];
                 $bid = $array['subcategoryid'];
                if($catid == 1){
                $list[] = [
                              'id' => $array['id'],
                              'sid' => $array['subcategoryid'],
                              'pname' => $array['product_name'],
                              'url' => "https://sellit.co.in/sellapp/variant.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                    ];
                }else if($catid == 3){
                   $list[] = [
                              'id' => $array['id'],
                              'sid' => $array['subcategoryid'],
                              'pname' => $array['product_name'],
                              'url' => "https://sellit.co.in/sellapp/tabletsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                    ];
                }else if($catid == 2){
                    $list[] = [
                              'id' => $array['id'],
                              'sid' => $array['subcategoryid'],
                              'pname' => $array['product_name'],
                              'url' => "https://sellit.co.in/sellapp/watchsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                    ];
                }else if($catid == 4){
                     $list[] = [
                              'id' => $array['id'],
                              'sid' => $array['subcategoryid'],
                              'pname' => $array['product_name'],
                              'url' => "https://sellit.co.in/sellapp/earpodsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                    ];
                }else{
                    $list[] = [
                              'id' => $array['id'],
                              'sid' => $array['subcategoryid'],
                              'pname' => $array['product_name'],
                              'url' => "https://sellit.co.in/sellapp/404.php",
                             'file' => 'https://sellit.co.in/admin/img/'.$array['product_image'],
                    ];
                }
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new topmobile();
    echo $output->getmobile(mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' AND `best` = 'active' AND `categoryid` = $cid"));
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
