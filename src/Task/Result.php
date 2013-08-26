<?php
namespace BullKing\Task;

/**
 * Task result object
 * 
 * @author Alexander Sergeychik
 */
class Result {
	
	/**
	 * Success flag
	 * 
	 * @var boolean
	 */
	protected $_succeed = false;
	
	/**
	 * Result data
	 * 
	 * @var mixed
	 */
	protected $_data = null;
	
	/**
	 * Construct result object
	 * 
	 * @param boolean $succeed
	 * @param mixed $data
	 */
	public function __construct($succeed, $data = null) {
		$this->_succeed = (bool)$succeed;
		$this->_data = $data;
	}
	
	/**
	 * Returns true when task succeed
	 * 
	 * @return boolean
	 */
	public function isSucceed() {
		return $this->_succeed;
	}
	
	/**
	 * Returns true if task failed
	 * 
	 * @return boolean
	 */
	public function isFailed() {
		return !$this->isSucceed();
	}
	
	/**
	 * Returns data
	 * 
	 * @return mixed
	 */
	public function getData() {
		return $this->_data;
	}
	
}