<?php


class Currencies_rate extends CI_Model
{

    public $sell_rate;
    public $buy_rate;
    public $datetime;
    public $currency_id;

//    public function __construct($id, $buy_rate, $sell_rate, $datetime)
  //  {
  //      $this->currency_id = $id;
  //      $this->buy_rate = $buy_rate;
  //      $this->sell_rate = $sell_rate;
  //      $this->datetime = $datetime;
  //  }


    public function getRatesByCode($code)
    {
        $this->db->select('*');
        $this->db->from('currencies_rates');
        $this->db->join('currencies', 'currencies.id = currencies_rates.currency_id');
        $this->db->where('currencies.code', $code);
        $query = $this->db->get();
        return $query;
    }


}