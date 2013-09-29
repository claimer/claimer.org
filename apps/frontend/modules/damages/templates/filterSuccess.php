<?php slot('title', __('Damages')) ?>

<h2><?php echo __('Filters') ?></h2>
<?php include_partial('damages/filter', array('form' => $form,
                                              'route' => url_for('damages'))) ?>

<?php if (count($chartByType['data']) > 0): ?>
<h2><?php echo __('Results overview') ?></h2>
<?php include_partial('damages/chartByType', array('chartByType' => $chartByType)) ?>
<?php endif; ?>

<h2><?php echo __('Results') ?></h2>
<?php include_partial('damages/list', array('pager' => $pager,
                                            'totalValue' => $totalValue,
                                            'route' => url_for('damages'))) ?>


<?php if ($pager->count() == 0): ?>
<p><b><?php echo __("No result.") ?></b></p>
<?php endif; ?>
