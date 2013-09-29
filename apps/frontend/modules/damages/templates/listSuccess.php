<?php slot('title', __('Your damages')) ?>

<?php include_partial('damages/list', array('pager' => $pager,
                                            'totalValue' => $totalValue,
                                            'route' => url_for('damages'))) ?>


<?php if ($pager->count() == 0): ?>
<p><b><?php echo __("You haven't registered any damage yet.") ?></b></p>
<?php endif; ?>
