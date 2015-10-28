<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class trans_lib
{
	private $error = array();

	function __construct()
	{
		$this->ci =& get_instance();
	}
	
	function jin_date_sql($date)
	{
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	 
	function jin_date_str($date)
	{
		if(strlen($date)>10)
		{
			$dt = explode(' ',$date);
			$exp = explode('-',$dt[0]);
			if(count($exp) == 3) {
				$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
			}
			return $date.' '.$dt[1];
		}
		else
		{
			$exp = explode('-',$date);
			if(count($exp) == 3) {
				$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
			}
			return $date;
		}
	}
	
	function get_day_name($day)
	{
		switch($day){
		case 1 : return "Senin"; 	break;
		case 2 : return "Selasa"; 	break;
		case 3 : return "Rabu"; 	break;
		case 4 : return "Kamis"; 	break;
		case 5 : return "Jumat"; 	break;
		case 6 : return "Sabtu"; 	break;
		case 7 : return "Minggu"; 	break;
		}
	}

	function get_month_name($month)
	{
		switch($month){
		case 1 : return "Januari"; break;
		case 2 : return "Februari"; break;
		case 3 : return "Maret"; break;
		case 4 : return "April"; break;
		case 5 : return "Mei"; break;
		case 6 : return "Juni"; break;
		case 7 : return "Juli"; break;
		case 8 : return "Agustus"; break;
		case 9 : return "September"; break;
		case 10 : return "Oktober"; break;
		case 11 : return "November"; break;
		case 12 : return "Desember"; break; 
		}
	}

	function get_indo_date($date)
	{
		$d = substr($date,8,2);
		$m = $this->get_month_name(substr($date,5,2));
		$y = substr($date,0,4);
		return $d." ".$m." ".$y;
	}
}

/* End of file trans_lib.php */
/* Location: ./application/libraries/trans_lib.php */