<form>
    <?php echo $iCurrencyValue->render('currency[value]', $sf_request->getParameter('currency[value]', '1.00')); ?>
    <?php echo $iCurrencyA->render('currency[a]', $sf_request->getParameter('currency[a]', 'USD')); ?>
    in
    <?php echo $iCurrencyB->render('currency[b]', $sf_request->getParameter('currency[b]', 'CHF')); ?>
    <input type="submit" value="Convert" />
</form>
<br />
<div>
    Result : <?php echo format_currency($result, $sf_request->getParameter('currency[b]', 'CHF'), 'fr'); ?>
</div>