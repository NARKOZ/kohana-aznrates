<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Currency aznrates controller.
 *
 * @author		Nihad Abbasov <mail@narkoz.me>
 * @copyright	Copyright (c) 2010, Nihad Abbasov
 * @license		http://creativecommons.org/licenses/BSD/ New BSD License
 */
class Controller_Currency extends Controller {

	/**
	 * Gets currency data for specified date
	 *
	 * @return void
	 */
	public function action_index($date)
	{
		$date = !empty($date) ? $date : date('d.m.Y');

		$currency = $this->_get_currency_model();
		$currency_data = $currency->get_currency_from_server($date);

		print_r($currency_data);
	}

	/**
	 * Outputs the currency data
	 *
	 * @return object
	 * @access protected
	 */
	protected function _get_currency_model()
	{
		if ($this->currency === NULL)
		{
			$this->currency = new Model_Currency;
		}

		return $this->currency;
	}

	protected $currency;

} // End Currency aznrates Controller

?>