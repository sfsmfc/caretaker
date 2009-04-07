<?php
 
require_once (t3lib_extMgm::extPath('caretaker').'/classes/class.tx_caretaker_AggregatorNode.php');
require_once (t3lib_extMgm::extPath('caretaker').'/classes/class.tx_caretaker_TestgroupRepository.php');
require_once (t3lib_extMgm::extPath('caretaker').'/classes/class.tx_caretaker_TestRepository.php');

class tx_caretaker_Testgroup extends tx_caretaker_AggregatorNode {
	
	public function __construct($uid, $title, $parent){
		parent::__construct($uid, $title, $parent, 'Testgroup' );
	}
	
	function findChildren (){
		
			// read subgroups
		$group_repository = tx_caretaker_TestgroupRepository::getInstance();
		$subgroups = $group_repository->getByParentGroupUid($this->uid, $this );
			// read instances
		$test_repository = tx_caretaker_TestRepository::getInstance();
		$tests = $test_repository->getByGroupId($this->uid, $this);
			// save
		$children = array_merge($subgroups, $tests);
		return $children;
	}
	

}

?>