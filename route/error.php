<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2010-2012 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * Route Errors
 *
 * @package    Eden
 * @category   route
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: exception.php 1 2010-01-02 23:06:36Z blanquera $
 */
class Eden_Route_Error extends Eden_Error_Model {
	/* Constants
	-------------------------------*/
	const CLASS_NOT_EXISTS 		= 'Invalid class call: %s->%s(). Class does not exist.';
	const METHOD_NOT_EXISTS 	= 'Invalid class call: %s->%s(). Method does not exist.';
	const STATIC_ERROR 			= 'Invalid class call: %s::%s().';
	const FUNCTION_ERROR 		= 'Invalid function run: %s().';
	
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function get($message = NULL, $code = 0) {
		$class = __CLASS__;
		return new $class($message, $code);
	}
	
	/* Magic
	-------------------------------*/
    /* Public Methods
	-------------------------------*/
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}