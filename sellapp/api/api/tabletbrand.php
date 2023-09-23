<?php 
    include 'config.php';
    class tabletbrand{
        public function getbrand($getquery){
            foreach($getquery as $array){
                $list[] = [
                              'id' => $array['id'],
                             'file' => 'https://sellit.co.in/admin/img/'.$array['subcategory_image'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new tabletbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 3 ORDER BY `id` DESC LIMIT 4 "));

?>
