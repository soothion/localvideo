	function docs($field, $value) {
		extract(string2array($this->fields[$field]['setting']));
		$list_str = array();
		$file_list = string2array($value);
		return $file_list;		
	}
