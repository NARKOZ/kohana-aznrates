<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Currency aznrates model.
 *
 * @author		Nihad Abbasov <mail@narkoz.me>
 * @copyright	Copyright (c) 2010, Nihad Abbasov
 * @license		http://creativecommons.org/licenses/BSD/ New BSD License
 */
class Model_Currency extends Model {

    /**
	 * Parsing and formatting data from CBR (cbr.ru)
	 *
     * @param string $date date formatted as dd.mm.yyyy
     * @return string
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
		$EUR = round($currency[2]/$AZN, 4);
		$AUD = round($currency[2]/$AZN, 4);
		$JPY = round($currency[2]/$AZN, 4);
		$GBP = round($currency[2]/$AZN, 4);
		$BYR = round($currency[2]/$AZN, 4);
		$LVL = round($currency[2]/$AZN, 4);
		$TRY = round($currency[2]/$AZN, 4);
		$UAH = round($currency[2]/$AZN, 4);
		$EEK = round($currency[2]/$AZN, 4);

		$rates = array("AZN" => $AZN/$AZN, "RUR" => $RUR, "USD" => $USD, "EUR" => $EUR, "AUD" => $AUD, "JPY" => $JPY, "GBP" => $GBP, "BYR" => $BYR, "LVL" => $LVL, "TRY" => $TRY, "UAH" => $UAH, "EEK" => $EEK);
		return $rates;

    }
} // End Currency aznrates Model

?>