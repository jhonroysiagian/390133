<?php
/*************************************************************************
php easy :: pagination scripts set - Version Three
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/
function paginate_three($reload, $page, $tpages, $adjacents) {
	
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	
	$out = "<div class=\"pagination\"><ul>";
	
	// previous
	if($page==1) {
		$out.= "<li><span>" . $prevlabel . "</span></li>";
	}
	elseif($page==2) {
		$out.= "<li><a href=\"" . $reload . "\">" . $prevlabel . "</a></li>";
	}
	else {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a></li>";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li><a href=\"" . $reload . "\">1</a></li>";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><span>...</span></li>";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li><span class=\"current\">" . $i . "</span></li>";
		}
		elseif($i==1) {
			$out.= "<li><a href=\"" . $reload . "\">" . $i . "</a></li>";
		}
		else {
			$out.= "<li><a href=\"" . $reload . "&amp;page=" . $i . "\">" . $i . "</a></li>";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><span>...</span></li>";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a></li>";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" . ($page+1) . "\">" . $nextlabel . "</a></li>";
	}
	else {
		$out.= "<li><span>" . $nextlabel . "</span></li>";
	}
	
	$out.= "</ul></div>";
	
	return $out;
}
?>