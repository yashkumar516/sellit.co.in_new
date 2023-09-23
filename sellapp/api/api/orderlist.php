<?php 
    include 'config.php';
     if(isset($_GET['uid']) && isset($_GET['flag'])){
        $uid = $_GET['uid'];
        $flag = $_GET['flag'];
    if(!empty($uid)){ 
    class getaddress{
        public function get($getquery){
            foreach($getquery as $array){
                $list[] = [
                             'devicename' => $array['model_name'],
                             'varienname' => $array['varient'],
			     'image' => "https://sellit.co.in/admin/img/".$array['mimg'],
			      'orderno' => $array['genorderid'],
                             'date' => $array['modify_date'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new getaddress();
    echo $output->get(mysqli_query($con,"SELECT * FROM `enquiry` INNER JOIN varient ON enquiry.varientid = varient.id WHERE enquiry.status = '$flag' AND enquiry.userid = '$uid'"));
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
                'message' => 'method should be GET'
            ];
            echo json_encode($list);
    }
?>
