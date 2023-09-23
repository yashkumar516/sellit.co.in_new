<?php 
    include '../admin/includes/confile.php';
    if(isset($_GET['page_no'])){
    $page = 1;
    $page = $_GET['page_no'];
    $per_page = 2;
    $start = ($page - 1) * $per_page;
    $query = mysqli_query($con,"SELECT * FROM `enquiry` ORDER BY `id` DESC limit $start,$per_page ");
    $querycount = mysqli_num_rows($query);
    header("Access-Control-Allow-Origin: *");
    header('content-type:application/json; charset=UTF-8');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    if($querycount>0){
        while($enquirydata = mysqli_fetch_assoc($query)){
            $data[] = $enquirydata;
        }
        echo json_encode(['status'=>true,'data'=>$data,'result'=>'found']);
     }
    else{
        echo json_encode(['status'=>false,'data'=>'data not found','result'=>'not']);
    }
 }else{
    $per_page = 2;
    $query = mysqli_query($con,"SELECT * FROM `enquiry` ORDER BY `id` DESC limit $per_page ");
    $querycount = mysqli_num_rows($query);
    header("Access-Control-Allow-Origin: *");
    header('content-type:application/json; charset=UTF-8');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    if($querycount>0){
        while($enquirydata = mysqli_fetch_assoc($query)){
            $data[] = $enquirydata;
        }
        
        echo json_encode(['status'=>true,'data'=>$data,'result'=>'found']);
     }
    else{
        echo json_encode(['status'=>false,'data'=>'data not found','result'=>'not']);
    }
 }
 

?>
