<?php
namespace App\helper;

class customHelper{

	public static function minPrice(){
		return floor(\App\Models\backend\admin\Product::min('sell_price'));
	}

	public static function maxPrice(){
		return floor(\App\Models\backend\admin\Product::max('sell_price'));
	}


// load currency
	public static function currencyLoad(){
		if (session()->has('default_currency_info') == false) {
			session()->put('default_currency_info',\App\Models\backend\admin\Currency::find(1));
		}
	}

//currence convert
	public static function currencyConvert($amount){
		return formatPrice(convertPrice($amount));
	}


}


if (!function_exists('convertPrice')) {

		function convertPrice($price){

			customHelper::currencyLoad();

			$default_currency_info = session('default_currency_info');
			$price = floatval($price) / floatval($default_currency_info->exchange_rate);

			if (session()->has('currency_rate')) {
				$exchange = session('currency_rate');
				// echo "<pre>";print_r($exchange);exit;
				
			}else{
				$exchange = $default_currency_info->exchange_rate;
				// echo "<pre>";print_r($exchange);exit;
				
			}
			$price = floatval($price) * floatval($exchange);
			

			return $price;
		}
	}

	//currency symbol
	if (!function_exists('currencySymbol')) {
		function currencySymbol(){
			customHelper::currencyLoad();
			if (session()->has('currency_symbol')) {
				$symbol = session('currency_symbol');
			}else{
				$default_currency_info = session('default_currency_info');
				$symbol = $default_currency_info->symbol;
			}

			return $symbol;
		}
	}

	//format price
	if (!function_exists('formatPrice')) {
		function formatPrice($price){
			return currencySymbol().number_format($price,2);
		}
	}

?>