<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait WalletNetworkTrait
{
    public function getData()
    {
        $data = [
            'id' => $this->id,
            'network' => $this->network,
            'wallet' => $this->wallet,
        ];
        switch ($this->network) {
            case "TRC20":{
                    $response = Http::get("https://apilist.tronscan.org/api/account?address=" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];

                    $data['coins'] = $response_data['trc20token_balances'];

                    break;
                }
            case "BEP2":{
                    $response = Http::get("https://dex.binance.org/api/v1/account/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = 0;

                    foreach ($response_data['balances'] as $balance) {
                        $data['balance'] += $balance['free'];
                    }

                    $data['coins'] = $response_data['balances'];

                    break;
                }
            case "BEP20":{
                    $response = Http::get("https://api.bscscan.com/api?module=account&action=balance&apikey=K5F5VT1RBGC5I7PQ8WA5NQ4IN6NU6Y53R7&address=" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['result'];
                    $data['coin'] = 'BNB';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "DOGE":{
                    $response = Http::get("https://dogechain.info/api/v1/address/balance/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];
                    $data['coin'] = 'Doge';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "ERC20":{
                    $response = Http::get("https://api.etherscan.io/api?module=account&action=balance&tag=latest&apikey=PHU9TKPVHW95JVDAUNIUAVPAF7EGEDS66Q&address=" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['result'];
                    $data['coin'] = 'Ethereum';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "XRP":{
                    $response = Http::get("https://api.xrpscan.com/api/v1/account/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['Balance'];
                    $data['coin'] = 'XRP';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "BTC":{
                    $response = Http::withHeaders([
                        'api-key' => 'a4c9cb07-5b94-43fd-823b-d64932565e41',
                    ])->get("https://btc.nownodes.io/api/v2/address/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];
                    $data['coin'] = 'BTC';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "BCH":{
                    $response = Http::withHeaders([
                        'api-key' => 'a4c9cb07-5b94-43fd-823b-d64932565e41',
                    ])->get("https://btc.nownodes.io/api/v2/address/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];
                    $data['coin'] = 'BitcoinCash';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "LTC":{
                    $response = Http::withHeaders([
                        'api-key' => 'a4c9cb07-5b94-43fd-823b-d64932565e41',
                    ])->get("https://ltcbook.nownodes.io/api/v2/address/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];
                    $data['coin'] = 'LTC';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
            case "DASH":{
                    $response = Http::withHeaders([
                        'api-key' => 'a4c9cb07-5b94-43fd-823b-d64932565e41',
                    ])->get("https://dash.nownodes.io/api/v2/address/" . $this->wallet);

                    $response_data = $response->json();

                    $data['balance'] = $response_data['balance'];
                    $data['coin'] = 'DASH';

                    // $data['coins'] = $response_data['balances'];

                    break;
                }
          
        }

        return $data;
    }
}
