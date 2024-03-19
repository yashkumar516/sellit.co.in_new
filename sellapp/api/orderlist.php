<?php 
    include 'config.php';
     if(isset($_GET['uid']) && isset($_GET['flag'])){
        $uid = mysqli_real_escape_string($con,$_GET['uid']);
        $flag = mysqli_real_escape_string($con,$_GET['flag']);
    if(!empty($uid)){ 
    class getaddress{
        public function get($getquery,$publicUrl){
            foreach($getquery as $array){
                $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
                $replacement = "https://drive.google.com/uc?id=$1";
                $image= strpos($array['mimg'], "https://drive.google.com") !== false? preg_replace($pattern, $replacement, $array['mimg']):$array['mimg'];
                
                $list[] = [
                             'devicename' => $array['model_name'],
                             'varienname' => $array['varient'],
			     'image' => $publicUrl."admin/img/".$image,
			      'orderno' => $array['genorderid'],
                             'date' => $array['modify_date'],
                    ];
                    $array = $list;
            }
            return json_encode($array);
        }
    } 
    $output = new getaddress();
    echo $output->get(mysqli_query($con,"SELECT * FROM `enquiry` INNER JOIN varient ON enquiry.varientid = varient.id WHERE enquiry.status = '$flag' AND enquiry.userid = '$uid'"),$publicUrl);
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