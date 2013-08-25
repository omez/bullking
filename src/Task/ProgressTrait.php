<?php
namespace BullKing\Task;

/**
 * Progress managing trait
 * 
 * @author Alexander Sergeychik
 * 
 * @todo manage situations when new progress lower than previous
 * @todo set formatting of result
 */
class ProgressTrait {
	
	protected $_progress = 0.0;
	
	/**
	 * Returns progress
	 * @return float
	 */
	public function getProgress() {
		return (float)$this->_progress;
	}
	
	/**
	 * Sets progress
	 * @param integer|float $progress
	 * @return ProgressTrait
	 */
	public function setProgress($progress) {
		$progress = (float)$progress;
		
		if ($progress < $this->getProgress()) {
			trigger_error('Progress value is lower than current', E_USER_WARNING);
		}
		
		$this->_progress = (float)$progress;
		return $this;
	}
	
}