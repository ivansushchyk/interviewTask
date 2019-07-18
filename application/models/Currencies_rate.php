<?php


class Currencies_rate extends CI_Model
{

    public $sell_rate;
    public $buy_rate;
    public $datetime;
    public $currency_id;



    public function getRatesByCode($code)
    {
        $this->db->select('*');
        $this->db->from('currencies_rates');
        $this->db->join('currencies', 'currencies.id = currencies_rates.currency_id');
        $this->db->where('currencies.code', $code);
        $this->db->order_by('datetime', 'DESC');
        $query = $this->db->get();
        return $query;
    }


}