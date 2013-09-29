<?php
class sfRate
{
    protected
        $currencyFrom = null,
        $currencyTo = null,
        $amount = 0,
        $rate = 0,
        $url = 'http://download.finance.yahoo.com/d/quotes.csv?s=%from%%to%=X&f=sl1d1t1c1ohgv&e=.csv';
        
    public function __construct($amount, $currencyForm, $currencyTo)
    {
        $this->currencyFrom = strtoupper($currencyForm);
        $this->currencyTo = strtoupper($currencyTo);
        $this->amount = $amount;
    }
    
    public function getRate()
    {
        $tmp = explode(',', $this->getCsv());
        
        return $this->amount * $tmp[1];
    }
    
    protected function getCsv()
    {
        $content = file_get_contents(strtr($this->url, array(
            '%from%' => $this->currencyFrom,
            '%to%' => $this->currencyTo
        )));
        
        return $content;
    }
}