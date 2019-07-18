<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function index()
    {

        $this->load->database();
        $this->load->model('Currencies_rate');


        // GET TIME THE LAST RATE
        $this->db->select('datetime');
        $this->db->from('currencies_rates');
        $this->db->order_by('datetime DESC');
        $this->db->limit(1);
        $dateQuery = $this->db->get();
        $datetimeLastRate = $dateQuery->result()[0]->datetime; //
        $lastDatetime = new DateTime($datetimeLastRate);
        $now = new DateTime();
        $interval = $now->diff($lastDatetime);
        $diffMinutes = $interval->format('%i');


        if($diffMinutes >=10){              // GET DATA FROM API
            $json = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
            $rates = json_decode(file_get_contents($json)); // Array with actually rates USD EUR RUB BTN
            foreach ($rates as $rate) {
                if ($rate->ccy == 'BTC') {
                    continue;
                }
                $currencyRate = new Currencies_rate();
                $currencyRate->datetime = date('Y-m-d H:i:s');
                $currencyRate->buy_rate = $rate->buy;
                $currencyRate->sell_rate = $rate->sale;

                // select currency_id from currencies_rates inner join currencies on currencies.id = currencies_rates.id where code = 'USD'

                $this->db->select('id');
                $this->db->from('currencies');
                $this->db->where('code', $rate->ccy);
                $query = $this->db->get();
                $id = $query->result()[0]->id;
                $currencyRate->currency_id = $id;
                $this->db->insert('currencies_rates', $currencyRate);
            }
        }





        // GET ACTUALLY RATES => select buy_rate,sell_rate from currencies_rates order by datetime DESC, currency_id LIMIT 3
        $this->db->select('currencies.code,currencies_rates.sell_rate,currencies_rates.buy_rate');
        $this->db->from('currencies_rates');
        $this->db->join('currencies', 'currencies.id = currencies_rates.currency_id');
        $this->db->order_by('datetime DESC, currency_id');
        $this->db->limit(3);
        $query = $this->db->get();
        $date = [];
        foreach ($query->result() as $rate) {
            $date = array_merge($date, array($rate->code => array($rate->buy_rate, $rate->sell_rate)));
        }

        $this->load->view('home_page', $date);
    }


}
