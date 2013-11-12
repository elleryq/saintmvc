<?php
class application
{
	/*
	 * @var string
	 * @access public
	 */
	var $startPath ;

	/*
	* @var string
	* @access public 
	*/	
	var $systemPath;

	/*
	* @var string
	* @access public
	*/
	var $applicationPath;


	function __construct()
	{
		$this->getStartPath();
		$this->systemPath = $this->startPath . "/system/";
		$this->applicationPath = $this->startPath . "/application/";
	}

	/*
	*get index.php path 
	*
	* @access protcted
	* @return void;
	*/
	protected function getStartPath()
	{
		//$this->startPath = str_replace("\\", "/",pathinfo(__FILE__, PATHINFO_DIRNAME))  ;	
		$this->startPath = realpath(dirname(__FILE__));
	}
	 


}
?>
