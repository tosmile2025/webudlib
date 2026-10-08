<?php 
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strweek= date("w",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		
		$str_day = array("","จันทร์","อังคาร","พุทธ","พฤหัส","ศุกร","เสาร์","อาทิตย์");
		$arr_w = $str_day[$strweek];
		
		return "$arr_w, $strDay, $strMonthThai, $strYear, $strHour:$strMinute";
	}

	$strDate = date("j-n-Y H:i:s");
	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
	//echo date("j-n-Y");
?>

