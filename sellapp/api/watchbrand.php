<?php 
    include 'config.php';
    class watchbrand{
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
    $output = new watchbrand();
    echo $output->getbrand(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 2 ORDER BY `id` DESC LIMIT 4 "));

?>
