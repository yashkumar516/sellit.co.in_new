<?php 
    include 'config.php';
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
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 1 ORDER BY `id` DESC LIMIT 4 "));

?>
