<?php
class History extends CI_Controller
{

    public function byCurrency($code)
    {

        $this->load->database();
        $this->load->model('Currencies_rate');


         switch ($code) {
            case 'EUR':
                $query = $this->Currencies_rate->getRatesByCode($code);
                break;
            case 'USD':
                $query = $this->Currencies_rate->getRatesByCode($code);
                break;
            case 'RUR':
                $query = $this->Currencies_rate->getRatesByCode($code);
                break;
            default:
                header("HTTP/1.0 404 Not Found");
                exit;
        }

        $data['rates'] = $query->result();

        $this->load->view('currency_rates_history',$data);
    }


}