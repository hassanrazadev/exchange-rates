<?php
namespace HassanRazaDev\ExchangeRates;

use GuzzleHttp\Client;

class Currency {


    /**
     * convert one currency to other
     * - fromCurrency = Base currency
     * - toCurrency = Target currency, it can be single or multiple as array
     * - date = In case of historical data, date format should be YYYY-MM-DD
     * @param  string  $fromCurrency
     * @param  null | string | array  $toCurrency
     * @param  string  $date
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function convert($fromCurrency = 'EUR', $toCurrency = null, $date = ''): array {
        $url = 'https://api.exchangerate.host';

        if ($date) {
            $url = $url . '/' . $date;
        } else {
            $url = $url . '/latest';
        }

        if ($toCurrency) {
            $toCurrency = is_array($toCurrency) ? $toCurrency : [$toCurrency];
            $url = $url . '?symbols=';
            foreach ($toCurrency as $currency) {
                $url = $url . $currency . ',';
            }
            $url = rtrim($url, ',') . '&base='.$fromCurrency;
        } else {
            $url = $url . '?base='.$fromCurrency;
        }

        $client = new Client();
        $request = $client->get($url);
        $response = json_decode($request->getBody()->getContents());
        unset($response->motd);
        return  (array) $response;
    }
}
