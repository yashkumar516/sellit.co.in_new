<?php 
    include 'config.php';
    if(isset($_POST['cid'])){
        $cid = mysqli_real_escape_string($con,$_POST['cid']);
    if(!empty($cid)){        
    class topmobbrand{
        public function getbrand($getquery,$publicUrl){
            foreach($getquery as $array){
                  $catid = $array['category_id'];
                  $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
                $replacement = "https://drive.google.com/uc?id=$1";
                $brandImage = $array['image_url'] !=="external" ? $publicUrl.'admin/img/'.$array['subcategory_image']: preg_replace($pattern, $replacement, $array['subcategory_image']);
                $brandImage= strpos($array['subcategory_image'], "https://drive.google.com") !== false? preg_replace($pattern, $replacement, $array['subcategory_image']):$brandImage;
                
                $list[] = [
                              'id' => $array['id'],
                             'file' => $brandImage,
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new topmobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `top` = 'active' AND `category_id` = $cid"),$publicUrl);
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