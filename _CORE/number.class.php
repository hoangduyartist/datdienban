<?php
/*
	@All rights reserved
	Support by	:	_
	Edited by	:	_
*/

//	Public function
//	*	string	ngat_so($so)	:	1000000.18 -> 1,000,000.18

//	Private function
//	*	string	ngat_so_($so)	:	1000000.18 -> 1,000,000

class	lg_number
{
//	Public	function
	public static function fix_number($wtext)
    {
            $tong=strlen($wtext);
            $wtext=strrev($wtext);
            $wso='';
            for ($i=1;$i<=$tong;$i++)
            {
                    if ($i % 3 == 0)
                    {
                            $wso=$wso.substr($wtext,($i-1),1).',';
                    }
                    else
                    {
                            $wso=$wso.substr($wtext,($i-1),1);
                    }
            }
            $wso=strrev($wso);
            if (substr($wso,0,1)==',')
            {
                    $wso=substr($wso,1,($tong+2));
            }
            return $wso;
    }
	public static function fix_number1($wtext)
    {
            $tong=strlen($wtext);
            $wtext=strrev($wtext);
            $wso='';
            for ($i=1;$i<=$tong;$i++)
            {
                    if ($i % 3 == 0)
                    {
                            $wso=$wso.substr($wtext,($i-1),1).'.';
                    }
                    else
                    {
                            $wso=$wso.substr($wtext,($i-1),1);
                    }
            }
            $wso=strrev($wso);
            if (substr($wso,0,1)=='.')
            {
                    $wso=substr($wso,1,($tong+2));
            }
            return $wso;
    }
    
    public static	function	money($so, $num = 0)
	{
		return	self::ngat_so($so);
		// return money_format($so , $num);
	}
	public static	function	ngat_so($so)
	{
		$dau = "";
		if ($so < 0)	{	$so = abs($so);	$dau = "-"; }
		$x		=	explode(".",$so);
		$du		=	$x[1];
		$so		=	$x[0];
		$x		=	self::_ngat_so($so);
		if ( ($du <> 0) && (!empty($du)) )		$x		=	$x	.".".	$du;
		return	$dau.$x;
	}
	public static function doc3so($so)
	{
		$achu = array ( " không "," một "," hai "," ba "," bốn "," năm "," sáu "," bảy "," tám "," chín " );
		$aso = array ( "0","1","2","3","4","5","6","7","8","9" );
		$kq = "";
		$tram = floor($so/100); // Hàng trăm
		$chuc = floor(($so/10)%10); // Hàng chục
		$donvi = floor(($so%10)); // Hàng đơn vị
		if($tram==0 && $chuc==0 && $donvi==0) $kq = "";
		if($tram!=0)
		{
			$kq .= $achu[$tram] . " trăm ";
			if (($chuc == 0) && ($donvi != 0)) $kq .= " lẻ ";
		}
		if (($chuc != 0) && ($chuc != 1))
		{
				$kq .= $achu[$chuc] . " mươi";
				if (($chuc == 0) && ($donvi != 0)) $kq .= " linh ";
		}
		if ($chuc == 1) $kq .= " mười ";
		switch ($donvi)
		{
			case 1:
				if (($chuc != 0) && ($chuc != 1))
				{
					$kq .= " mốt ";
				}
				else
				{
					$kq .= $achu[$donvi];
				}
				break;
			case 5:
				if ($chuc == 0)
				{
					$kq .= $achu[$donvi];
				}
				else
				{
					$kq .= " lăm ";
				}
				break;
			default:
				if ($donvi != 0)
				{
					$kq .= $achu[$donvi];
				}
				break;
		}
			
		return $kq;
	}
	public static function doc_so($so)
	{
		$so = preg_replace("([a-zA-Z{!@#$%^&*()_+<>?,.}]*)","",$so);
		if (strlen($so) <= 21)
		{
			$kq = "";
			$c = 0;
			$d = 0;
			$tien = array ( "", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ", " tỷ tỷ" );
			for ($i = 0; $i < strlen($so); $i++)
			{
				if ($so[$i] == "0")
					$d++;
				else break;
			}
			$so = substr($so,$d);
			for ($i = strlen($so); $i > 0; $i-=3)
			{
				$a[$c] = substr($so, $i, 3);
				$so = substr($so, 0, $i);
				$c++;
			}
			$a[$c] = $so;
			for ($i = count($a); $i > 0; $i--)
			{
				if (strlen(trim($a[$i])) != 0)
				{
					if (doc3so($a[$i]) != "")
					{
						if (($tien[$i-1]==""))
						{
							if (count($a) > 2)
								$kq .= " không trăm lẻ ".doc3so($a[$i]).$tien[$i-1];
							else $kq .= doc3so($a[$i]).$tien[$i-1];
						}
						else if ((trim(doc3so($a[$i])) == "mười") && ($tien[$i-1]==""))
						{
							if (count($a) > 2)
								$kq .= " không trăm ".doc3so($a[$i]).$tien[$i-1];
							else $kq .= doc3so($a[$i]).$tien[$i-1];
						}
						else
						{
						$kq .= doc3so($a[$i]).$tien[$i-1];
						}
					}
				}
			}
			return $kq;
		}
		else
		{
			return "Số quá lớn!";
		}
	}
//	Private	function
	private	function	_ngat_so($so)
	{
		$dem	=	0;
		$x		=	"";
		for ($i = strlen($so)-1; $i >= 0; $i--)
		{
			$dem++;
			$x = substr($so,$i,1).$x;
			if ( ($i <> 0) && ($dem % 3 == 0) )	$x = ",".$x;
		}
		return $x;
	}
}
?>