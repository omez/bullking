<?php
namespace BullKing\Task;

class CallbackTask extends AbstractTask {
	
	/**
	 * 
	 * @var \Closure|callback
	 */
	protected $_callback = null;
	
	/**
	 * Construct Callback task
	 * 
	 * @param callable $callback
	 */
	public function __construct($callback = null) {
		if ($callback) {
			$this->setCallback($callback);
		}
	}
	
	/**
	 * Returns callback assigned to task
	 * 
	 * @return \Closure|callback
	 */
	public function getCallback() {
		if (!$this->_callback) {
			throw new \RuntimeException('Callback is not set to task');
		}
		return $this->_callback;
	}
	
	/**
	 * Sets callback function
	 * 
	 * @param \Closure|callback $callback
	 * @throws \InvalidArgumentException
	 * @return CallbackTask
	 */
	public function setCallback($callback) {
		if (!$callback || !is_callable($callback)) {
			throw new \InvalidArgumentException('Invalid callback provided');
		}
		$this->_callback = $callback;
		return $this;
	}
	
	/**
	 * Overrided run function
	 * 
	 * @return mixed
	 */
	protected function _run() {
		$callback = $this->getCallback();
		
		return call_user_func($callback, $this);
	}
	
}