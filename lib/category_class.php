<?php

class category_class 
{
	public $items;
	private $table;
	function __construct($type=null,$name=null) {
		$table = new table_class(get_config('tb_category'));
		if(empty($name)){
			if(empty($type)){
				$items = $table->find('all');
			}else{
				$items = $table->find('all',array('conditions' => "category_type = '" .$type ."'",'order' => 'priority'));
			}
		}else{
			$items = $table->find('all',array('conditions' => "name = '" .$name ."'",'order' => 'platform ,priority'));
		}
		
		if($items){
			foreach ($items as $item) {
				$this->items[$item->id] = $item;
			}
		}
		
	}
	
	public function &find($id){
		return $this->items[$id];
	}
	
	public function find_sub_category($parent_id=null){
		$ret = array();
		if(empty($parent_id)){
			foreach ($this->items as $v) {
				if(!$v->parent_id){
					array_push($ret, $v );
				}
			}
			return $ret;
		}
		if(array_key_exists($parent_id, $this->items)){
			return null;
		}

		foreach ($this->items as $v) {
			if($v->parent_id == $parent_id){
				array_push($ret ,$v );
			};
		}
	}
	
	public function echo_jsdata($var_name='category'){
		?>
		<script>
			var <?php echo $var_name;?> = new category_class();
			<?php if($this->items){ foreach ($this->items as $v) {
				echo "$var_name.push(new category_item_class('$v->id','$v->name','$v->parent_id','$v->priority'));";
			}}?>
		</script>
		<?php
	}
	
	public function echo_select($name="category_select"){
		?>
		<script>			
			var relation = new Array();			
		</script>
		<?
	}
	
}

?>