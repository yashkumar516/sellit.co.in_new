<?php 
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include 'config.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    if(!empty($_POST['search'])){
        $search  = $_POST['search'];
    class search{
        public function getresult($getquery){
            foreach($getquery as $array){
                $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
                $replacement = "https://drive.google.com/uc?id=$1";
                $productImage = $array['image_url'] !=="external" ? 'https://sellit.co.in/admin/img/'.$array['product_image']: preg_replace($pattern, $replacement, $array['product_image']);
                $productImage= strpos($array['product_image'], "https://drive.google.com") !== false? preg_replace($pattern, $replacement, $array['product_image']):$productImage;
                
                $bannerlist[] = [
                             'url' => 'https://sellit.co.in/sellapp/variant.php?id='.$array['id'].'&&bid='.$array['subcategoryid'],
                             'name'=>$array['product_name'],
                             'id'=>$array['id'],
                             'imageurl'=>$productImage,
                    ];
                    $response = $bannerlist;
            }
            if(!empty($response)){
                 http_response_code(200);
               echo json_encode(array(
              "status" => "1",
              "response" => $response
               )); 
            }else{
               http_response_code(200);
               echo json_encode(array(
              "status" => "0",
              "response" => "no record found "
               )); 
            }
        }
    } 
    $output = new search();
    echo $output->getresult(mysqli_query($con,"SELECT * FROM `product` WHERE `product_name` LIKE '%$search%' "));
}else{
     http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please provide search"
    ));  
  }    
}else{
     http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "method should be post"
    ));
}
?>