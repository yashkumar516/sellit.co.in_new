<?php 
    include 'config.php';
     if(isset($_POST['bid']) && isset($_POST['sid']) && isset($_POST['cid'])){
        $bid = mysqli_real_escape_string($con,$_POST['bid']);
        $sid = mysqli_real_escape_string($con,$_POST['sid']);
        $cid = mysqli_real_escape_string($con,$_POST['cid']);
    if(!empty($bid)){ 
    class mobbrand{
        public function getbrand($getquery,$bid,$publicUrl){
            foreach($getquery as $array){
                $catid = $array['categoryid'];
               
                $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
                $replacement = "https://drive.google.com/uc?id=$1";
                $productImage = $array['image_url'] !=="external" ? $publicUrl.'admin/img/'.$array['product_image']: preg_replace($pattern, $replacement, $array['product_image']);
                $productImage= strpos($array['product_image'], "https://drive.google.com") !== false? preg_replace($pattern, $replacement, $array['product_image']):$productImage;
                
                if($catid == 1){
                $list[] = [   
                             'url' => $publicUrl."sellapp/variant.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => $productImage,
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 3){
                     $list[] = [   
                             'url' => $publicUrl."sellapp/tabletsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => $productImage,
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 2){
                     $list[] = [   
                             'url' => $publicUrl."sellapp/watchsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => $productImage,
                             'name' => $array['product_name'],
                    ];
                }else if($catid == 4){
                     $list[] = [   
                             'url' => $publicUrl."sellapp/earpodsold.php?id=".$array["id"]."&&bid=".$bid,
                             'file' => $productImage,
                             'name' => $array['product_name'],
                    ];
                }else{
                     $list[] = [   
                             'url' => $publicUrl."sellapp/404.php",
                             'file' => $productImage,
                             'name' => $array['product_name'],
                    ];
                }
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' AND `subcategoryid` = '$bid' AND `categoryid` = '$cid' AND `childcategoryid` = '$sid' ORDER BY  `counter` DESC, `modify_date` DESC"),$bid,$publicUrl);
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