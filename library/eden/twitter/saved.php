<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2011-2012 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * Twitter saved searches
 *
 * @package    Eden
 * @category   twitter
 * @author     Christian Symon M. Buenavista sbuenavista@openovate.com
 */
class Eden_Twitter_Saved extends Eden_Twitter_Base {
	/* Constants
	-------------------------------*/
	const URL_SAVED_SEARCHES	= 'https://api.twitter.com/1/saved_searches.json';
	const URL_GET_DETAIL		= 'https://api.twitter.com/1/saved_searches/show/%d.json';
	const URL_CREATE_SEARCH		= 'https://api.twitter.com/1/saved_searches/create.json';
	const URL_REMOVE			= 'https://api.twitter.com/1/saved_searches/destroy/%d.json';
	
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	public static function i() {
		return self::_getMultiple(__CLASS__);
	}
	
	/* Public Methods
	-------------------------------*/
	/**
	 * Create a new saved search for the authenticated user.
	 * A user may only have 25 saved searches.
	 *
	 * @param string
	 * @return array
	 */
	public function createSearch($input) {
		//Argument 1 must be a integer
		Eden_Twitter_Error::i()->argument(1, 'string');	
		
		$query  = array('query' => $input);
		
		$url = sprintf(self::URL_CREATE_SEARCH, $input);
		return $this->_post($url,$query);
	}
	
	/**
	 * Retrieve the information for the saved search represented 
	 * by the given id. The authenticating user must be the 
	 * owner of saved search ID being requested.
	 *
	 * @param integer
	 * @return array
	 */
	public function getDetail($id) {
		//Argument 1 must be a integer
		Eden_Twitter_Error::i()->argument(1, 'int');	
		
		$query  = array('id' => $id);
		
		return $this->_getResponse(self::URL_GET_DETAIL, $query);
	}
	
	/**
	 * Returns the authenticated user's 
	 * saved search queries.
	 *
	 * @return array
	 */
	public function getSavedSearches() {
		return $this->_getResponse(self::URL_SAVED_SEARCHES);
	}
	
	/**
	 * Destroys a saved search for the authenticating user.
	 * The authenticating user must be the owner of 
	 * saved search id being destroyed.
	 *
	 * @param integer
	 * @return array
	 */
	public function remove($id) {
		//Argument 1 must be a integer
		Eden_Twitter_Error::i()->argument(1, 'int');	
		
		$query  = array('id' => $id);
		
		$url = sprintf(self::URL_REMOVE, $id);
		return $this->_post($url,$query);
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}