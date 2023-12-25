<?php 
    include 'config.php';
    class mobbrand{
        public function getbrand($getquery){
            foreach($getquery as $array){
                $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
                $replacement = "https://drive.google.com/uc?id=$1";
                $brandImage = $array['image_url'] !=="external" ? 'https://sellit.co.in/admin/img/'.$array['subcategory_image']: preg_replace($pattern, $replacement, $array['subcategory_image']);
                $brandImage= strpos($array['subcategory_image'], "https://drive.google.com") !== false? preg_replace($pattern, $replacement, $array['subcategory_image']):$brandImage;
                
                $list[] = [
                              'url' => 'https://sellit.co.in/sellapp/oldmobile.php?id='.$array['id'],
                             'file' => $brandImage,
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new mobbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 1 ORDER BY `id` DESC LIMIT 4 "));

?>