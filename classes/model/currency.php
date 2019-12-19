<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Currency aznrates model.
 *
 * @author		Nihad Abbasov <nihad@42na.in>
 * @copyright	Copyright (c) 2010-2019, Nihad Abbasov
 * @license		http://creativecommons.org/licenses/BSD/ New BSD License
 */
class Model_Currency extends Model {

    /**
	 * Parsing and formatting data from CBR (cbr.ru)
	 *
     * @param string $date date formatted as dd.mm.yyyy
     * @return array
     */
    public function get_currency_from_server($date)
    {
        $allow_currency = array('AZN', 'USD', 'EUR', 'AUD', 'JPY', 'GBP', 'BYR', 'LVL', 'TRY', 'UAH', 'EEK'); // 'AUD', 'AZN', 'GBP', 'BYR', 'BGN', 'BRL', 'HUF', 'DKK', 'USD', 'INR', 'KZT', 'CAD', 'KGS', 'CNY', 'LVL', 'LTL', 'MDL', 'NOK', 'PLN', 'RON', 'XDR', 'SGD', 'TJS', 'TRY', 'TMT', 'UZS', 'UAH', 'CZK', 'SEK', 'CHF', 'EEK', 'ZAR', 'KRW', 'JPY'
        $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
        $text = @file_get_contents($link);

        $xml = new SimpleXMLElement($text);

        foreach ($xml->Valute as $exchange)
        {
            if(in_array($exchange->CharCode, $allow_currency))
            {
                $currency[] = UTF8::str_ireplace(',', '.', (string)$exchange->Value);
            }
        }

		$AZN = $currency[0];
		$RUR = round(1/$AZN, 4);
		$USD = round($currency[1]/$AZN, 4);
		$EUR = $AUD = $JPY = $GBP = $BYR = $LVL = $TRY = $UAH = $EEK = round($currency[2]/$AZN, 4);
		$AZN = $AZN/$AZN;

		$rates = array(
				"AZN" => $AZN,
				"RUR" => $RUR,
				"USD" => $USD,
				"EUR" => $EUR,
				"AUD" => $AUD,
				"JPY" => $JPY,
				"GBP" => $GBP,
				"BYR" => $BYR,
				"LVL" => $LVL,
				"TRY" => $TRY,
				"UAH" => $UAH,
				"EEK" => $EEK,
			);
		return $rates;

    }
} // End Currency aznrates Model

?>
