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
                $bannerlist[] = [
                             'url' => 'https://sellit.co.in/sellapp/variant.php?id='.$array['id'].'&&bid='.$array['subcategoryid'],
                             'name'=>$array['product_name'],
                             'id'=>$array['id'],
                             'imageurl'=>'https://sellit.co.in/admin/img/'.$array['product_image'],
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
