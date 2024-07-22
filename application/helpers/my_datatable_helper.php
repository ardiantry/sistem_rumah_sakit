<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_datatables($datatable_config, $parameter){	
	$table_name = $datatable_config['table_name'];
	$allow_search_column = $datatable_config['allow_search_column'];
	$search_parameter = $parameter['search'];	
	$default_order_column = $datatable_config['default_order_column'];
	$allow_order_column = $datatable_config['allow_order_column'];
	$extend_filter = isset($datatable_config['extend_filter']) ? $datatable_config['extend_filter'] : NULL;
	$order_parameter = $parameter['order'] ?? NULL;
	$length = intval($parameter['length']);
	$start = intval($parameter['start']);
	$draw = intval($parameter['draw']);
	
	$main_table = isset($datatable_config['main_table']) ? $datatable_config['main_table'] : $table_name;	
	$is_filter = isset($datatable_config['is_filter']) ? $datatable_config['is_filter'] : false;	
	
	$records_total = records_total($main_table, $extend_filter);
	//update
    //$records_filtered = records_filtered($table_name, $allow_search_column, $search_parameter, $default_order_column, $allow_order_column, $order_parameter, $extend_filter);
    $records_filtered = ($is_filter || isset($search_parameter['value'])) ?
		records_filtered($main_table, $allow_search_column, $search_parameter, $default_order_column, $allow_order_column, $order_parameter, $extend_filter)
		: $records_total;	
	
	$record = records($table_name, $allow_search_column, $search_parameter, $default_order_column, $allow_order_column, $order_parameter, $length, $start, $extend_filter);
	
	return array('draw' => $draw, 'data' => $record, 'recordsFiltered' => $records_filtered, 'recordsTotal' => $records_total);	
};

function records_total($table_name, $extend_filter = NULL){
	$ci = get_instance();
	$query = $ci->db->from($table_name);    
	if(!is_null($extend_filter)){
		$ci->db->where($extend_filter); 		
	}	
	return $query->count_all_results();	
}

function records_filtered($table_name, $allow_search_column, $search_parameter, $default_order_column, $allow_order_column, $order_parameter, $extend_filter = NULL){	
	$ci = get_instance();
	$query = $ci->db->from($table_name); 
	if(!is_null($extend_filter)){
		$ci->db->where($extend_filter); 		
	}	
	apply_filtering($query, $allow_search_column, $search_parameter);
	//update
	//apply_ordering($query, $default_order_column, $allow_order_column, $order_parameter);	
	return $query->count_all_results();		
}

function records($table_name, $allow_search_column, $search_parameter, $default_order_column, $allow_order_column, $order_parameter, $length, $start, $extend_filter = NULL){
	$ci = get_instance();
	$ci->db->from($table_name); 
	if(!is_null($extend_filter)){
		$ci->db->where($extend_filter); 		
	}
	apply_filtering($ci->db, $allow_search_column, $search_parameter);
	apply_ordering($ci->db, $default_order_column, $allow_order_column, $order_parameter);	
    apply_limit($ci->db, $length, $start);
    $query = $ci->db->get();        
	return $query->result();			
}

function apply_filtering($query, $allow_search_column, $search_parameter){
    //search 
    $i = 0;
    foreach($allow_search_column as $item) // looping awal
    {
        if($search_parameter['value']) // jika datatable mengirimkan pencarian dengan metode POST
        {
            if($i===0) // looping awal
            {
                $query->group_start(); 
                $query->like($item, $search_parameter['value']);
            }
            else{
                $query->or_like($item, $search_parameter['value']);
            }
            if(count($allow_search_column) - 1 == $i) 
                $query->group_end(); 
        }
        $i++;
    }		
};

function apply_ordering($query, $default_order_column, $allow_order_column, $order_parameter){	
	if(isset($order_parameter)) 
	{
		$query->order_by($allow_order_column[$order_parameter['0']['column']], $order_parameter['0']['dir']);
	} 
	else if(isset($default_order_column))
	{
		foreach($default_order_column as $key => $value){
			$query->order_by($key, $value);
		}
	}
}	

function apply_limit($query, $length, $start){
    if ($length != -1)        
        $query->limit($length, $start);               	
}