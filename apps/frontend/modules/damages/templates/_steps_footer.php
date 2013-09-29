<?php if (! isset($no_left)): ?>
<div class="left"><i><?php echo __('Please check your entries.') ?></i></div>
<?php endif ?>
<div class="right">
  <?php include_slot('steps_footer') ?>
</div>
<div class="clear"></div>