<?
// menu.class.php v1.0
// methods to obtain node and tree relationships

class Menu 
{
	// function: get next level of menu tree
	// returns: array
	function get_children($id)
	{
		$children = array();
		
		$query = "SELECT menu_id,menu_title,menu_url,menu_desc,menu_icon,menu_target FROM admin_menu WHERE parent_id = '$id' ORDER BY sort_id,menu_id";
		$result = $this->query($query);
		$count = 0;
		while ($row = mysql_fetch_array($result))	{
			$children[$count]['id'] = $row['menu_id'];	
			$children[$count]['title'] = $row['menu_title'];	
			$children[$count]['url'] = $row['menu_url'];	
			$children[$count]['desc'] = $row['menu_desc'];	
			$children[$count]['icon'] = $row['menu_icon'];	
			$children[$count]['target'] = $row['menu_target'];	
			$count++;
		}
		return $children;
	}
	

	function get_js_menu($id, $count = 0) {
		$appended = '';
		$link = '';
		$callStack = '';
	
		$children = $this->get_children(0);
		for ($x=0; $x<sizeof($children); $x++) {
			if(preg_match("/(\?)/",$children[$x]['url'])) {
				$qrystr = True;
			} else {
				$qrystr = False;
			}
			
			if($this->get_type($children[$x]['id']) == 1) {
				$link .= $appended."['".$children[$x]['icon']."','".$children[$x]['title']."','".$children[$x]['url']."','".$children[$x]['target']."','".$children[$x]['desc']."'".", \n";
			} else {
				$link .= $appended."['".$children[$x]['icon']."','".$children[$x]['title']."','".$children[$x]['url']."','".$children[$x]['target']."','".$children[$x]['desc']."'],\n";
			}
		
			$link = $this->tieredjstree($children[$x]['id'], $count, $link, $callStack, $children[$x]['id']);

			if($this->get_type($children[$x]['id']) == 1) {
				IF($x == 10)
				{
					$link .= $appended."],_cmSplit,"."\n";
				}
				ELSE
				{
					$link .= $appended."],_cmSplit,"."\n";
				}
			} else {
				
			}

		}
		return $link;
	}
	
	function tieredjstree($id, $count = 0, $link = array(), $callStack, $id) {
		$children = $this->get_children($id);
	$appended = '';
    //$appended = "&nbsp;&nbsp;&nbsp;&nbsp;\t"; 
    //for( $i = 0; $i < $callStack; $i++ ) {
     // $appended .= "&nbsp;&nbsp;&nbsp;&nbsp;\t"; 
    //}

		for ($x=0; $x<sizeof($children); $x++) {

			if(preg_match("/(\?)/",$children[$x]['url'])) {
				$qrystr = True;
			} else {
				$qrystr = False;
			}
			
			if($this->get_type($children[$x]['id']) == 1) {
				$link .= $appended."['".$children[$x]['icon']."','".$children[$x]['title']."','".$children[$x]['url']."','".$children[$x]['target']."','".$children[$x]['desc']."'".", \n";
			} else {
				$link .= $appended."['".$children[$x]['icon']."','".$children[$x]['title']."','".$children[$x]['url']."','".$children[$x]['target']."','".$children[$x]['desc']."'],"."";
			}

			$link = $this->tieredjstree($children[$x]['title'], $count, $link, $callStack + 1 , $children[$x]['id']);

			if($this->get_type($children[$x]['id']) == 1) {
				$link .= $appended."],_cmSplit,";
			} else {
				
			}

		}
		return $link;
	}

	// function: get whether this id is a branch or leaf
	// returns: boolean
	function get_type($id)
	{
		if($this->get_children($id))	{ 
			return 1; 
		}	else { 
			return 0; 
		}
	}

	// function: execute query $query
	// returns: result identifier
	function query($query)
	{
		$ret = mysql_query ($query) or die(mysql_error());
		return $ret;
	}

}

?>