<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phantrang2{
	function PageCurrent()
	{
		$url= explode('/',uri_string());
		$page=$url[count($url)-1];
		if(is_numeric($page))
		{
			return $page;
		}
		else
		{
			return 1;
		}
	}

	function PageFirst($limit, $current)
	{
		return ($current == 1)?0:(($current-1)*$limit);
	}

	function PagePer($total, $current, $limit, $url='')
	{
		if( $total == 0) return '';
		$numPage = floor( $total / $limit);
		if(( $total / $limit) - $numPage > 0)
		{
			$numPage += 1;
		}
		$html = '';
		if( $numPage == 1)
			return '';
		if( $current == 1)
		{
			$html.= "<li class = 'hidden-xs'><a>|<</a></li>";
			$html.= "<li><a><</a></li>";
		}
		else
		{
			$html.= "<li class = 'hidden-xs'><a href='$url/1'>|<</a></li>";
			$html.= "<li><a href='$url/".($current - 1)."'><</a></li>";
		}
		if($current <= 3)
		{
			for($i = 1; ($i <= 5) && ($i <= $numPage); $i++)
			{
				if($i == $current)
				{
					$html.= "<li class = 'active'><a>".$i."</a></li>";
				}
				else
				{
					$html.= "<li><a href='$url/$i'>$i</a></li>";
				}
			}
		}
		else
		{
			if($numPage >= $current + 2)
			{
				for($i = $current - 2; ($i <= $current + 2) && ($i <= $numPage); $i++)
				{
					if($i == $current)
					{
						$html.= "<li class = 'active'><a>".$i."</a></li>";
					}
					else
					{
						$html.= "<li><a href='$url/$i'>$i</a></li>";
					}
				}
			}
			else
			{
				for($i = $numPage - 4; $i <= $numPage; $i++)
				{
					if($i > 0)
					{
						if($i == $current)
						{
							$html.= "<li class = 'active'><a>".$i."</a></li>";
						}
						else
						{
							$html.= "<li><a href='$url/$i'>$i</a></li>";
						}
					}
				}
			}
		}
		if($current == $numPage)
		{
			$html.= "<li><a>></a></li>";
			$html.= "<li class = 'hidden-xs'><a>>|</a></li>";
		}
		else
		{
			$html.="<li><a href='$url/".($current + 1)."'>></a></li>";
			$html.="<li class = 'hidden-xs'><a href='$url/$numPage'>>|</a></li>";
		}
		$str = "";
		if($numPage > 0)
		{
		$str.= "<div class=\"row\">";
			$str.= "<div class=\"col-md-12 text-center\">";
				$str.= "<ul class=\"pagination\">";
					$str.= $html;
				$str.= "</ul>";
			$str.= "</div>";
		$str.= "</div>";
		}
		
		return $str;
	}
}

