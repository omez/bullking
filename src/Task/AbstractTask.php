<?php
namespace BullKing\Task;

abstract class AbstractTask {
	
	/**
	 * Configuration trait
	 * @var array
	 */
	protected $_configuration;
	
	/**
	 * Creates task with configuration
	 * @param array $configuration
	 */
	public function __construct(array $configuration = null) {
		if ($configuration) {
			$this->setConfiguration($configuration);
		}
	}
	
	/**
	 * Returns default task configuration
	 * @override
	 * @return array
	 */
	public function getDefaultConfiguration() {
		return array();
	}
	
	/**
	 * Returns task configuration
	 * @return array
	 */
	public function getConfiguration() {
		$configuration = $this->getConfiguration();
		$configuration = array_merge($configuration, $this->_configuration);
		return $this->_configuration;
	}
	
	/**
	 * Sets task configuration options
	 * @param array $configuration
	 * @return Task
	 */
	public function setConfiguration(array $configuration = array()) {
		$this->_configuration = $configuration;
		return $this;
	}
	
	public function __sleep() {
		throw new \RuntimeException('Unable to sleep with no implementation');	
	}
	
	public function __wakeup() {
		throw new \RuntimeException('Unable to wakeup with no implementation');
	}
	
	abstract public function _run();
	
	/**
	 * Runs task and returns result
	 * 
	 * @return Result
	 */
	public function run() {
		try {
			$result = $this->_run();
		} catch (\Exception $e) {
			$result = new Result(false, ($result instanceof Result ? $result->getData() : $result));
		}
		
		if (!$result instanceof Result) {
			$result = new Result(true, $result);
		}
		
		return $result;
	}
	
	
}