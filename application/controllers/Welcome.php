<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function index()
    {

        $this->load->database();
        $this->load->model('Currencies_rate');



        $json = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
        $arr = json_decode(file_get_contents($json)); // Array with actually rates ( 0 - USD , 1 - EUR , 2 - RUB , 3 - BTN)
        for($i=0;$i<3;$i++){  // BTM is unnecessary
            $object = new Currencies_rate();
            $object->currency_id = $i + 1;
            $object->sell_rate = $arr[$i]->sale;
            $object->buy_rate = $arr[$i]->buy;
            $object->datetime = date('Y-m-d H:i:s');
            $this->db->insert('currencies_rates', $object);
        }




        // GET ACTUALLY RATES => select buy_rate,sell_rate from currencies_rates order by datetime DESC, currency_id LIMIT 3
        $this->db->select('sell_rate,buy_rate');
        $this->db->from('currencies_rates');
        $this->db->order_by('datetime DESC, currency_id');
        $this->db->limit(3);
        $query = $this->db->get();

        $currencyRates = [];
        foreach ($query->result() as $currencyRate){
            array_push(  $currencyRates,[$currencyRate->sell_rate,$currencyRate->buy_rate]);
        }

        $data['usd'] = ['sell' => $currencyRates[0][0], 'buy' =>   $currencyRates[0][1]];
        $data['eur'] = ['sell' => $currencyRates[1][0], 'buy' =>   $currencyRates[1][1]];
        $data['rub'] =['sell' => $currencyRates[2][0], 'buy' =>   $currencyRates[2][1]];


        $this->load->view('home_page', $data);
    }
}
