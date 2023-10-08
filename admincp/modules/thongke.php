<?php
	use Carbon\Carbon;
    include('../config/config.php');
    require('../../carbon/autoload.php');
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    if(isset($_POST['thoigian'])){
    	$thoigian = $_POST['thoigian'];
	}else{
		$thoigian = '';
		$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	
	}

   
    if($thoigian=='7ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
	}elseif($thoigian=='28ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
	}elseif($thoigian=='90ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
	}elseif($thoigian=='365ngay'){
		$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	
	}elseif($thoigian=='1ngay'){
		$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(0)->toDateString();
	}
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 

    $sql = "SELECT * FROM tbl_thongke WHERE ngaydh BETWEEN '$subdays' AND '$now' ORDER BY ngaydh ASC";
    $sql_query = mysqli_query($mysqli,$sql);

    while($val = mysqli_fetch_array($sql_query)){

    	$chart_data[] = array(
	        'date' => $val['ngaydh'],
	        'order' => $val['sodonhang'],
	        'sales' => $val['doanhthu'],
	        'quantity' => $val['soluongban']

    	);
    }
  	// print_r($chart_data);
    echo $data = json_encode($chart_data);
   
?>