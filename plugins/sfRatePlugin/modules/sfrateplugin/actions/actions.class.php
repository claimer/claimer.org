<?php
/**
 * sfrateplugin actions.
 *
 * @package    sfRatePLugin
 * @subpackage sfrateplugin
 * @author     David Zeller <zellerda01@gmail.com>
 */
class sfratepluginActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->iCurrencyA = new sfWidgetFormI18nSelectCurrency(array('culture' => 'en', 'currencies' => array('CHF', 'USD', 'EUR')));
        $this->iCurrencyB = new sfWidgetFormI18nSelectCurrency(array('culture' => 'en', 'currencies' => array('CHF', 'USD', 'EUR')));
        $this->iCurrencyValue = new sfWidgetFormInput();
        
        $rate = new sfRate($request->getParameter('currency[value]', 0), $request->getParameter('currency[a]', 'USD'), $request->getParameter('currency[b]', 'EUR'));
        
        $this->result = $rate->getRate();
    }
}
