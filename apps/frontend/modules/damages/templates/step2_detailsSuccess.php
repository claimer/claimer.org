<?php if ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()): ?>
<?php slot('title', __('Register %user\'s damage', array('%user' => $form->getObject()->getClaimant()->getUsername()))) ?>
<?php else: ?>
<?php slot('title', __('Register your climate damage(s) here!')) ?>
<?php endif; ?>

<h2><?php echo __('%type damage', array('%type' => $form->getObject()->getType()->getName())) ?></h2>

<?php slot('steps', get_partial('steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('damage_edit', $form->getObject())) ?>
  <?php include_partial('edit_'.$form->getObject()->getType()->getType(), array('form' => $form[$form->getCurrentStepName()])) ?>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="next" value="<?php echo __('Next >>') ?>" class="right" />
    <input type="submit" name="previous" value="<?php echo __('<< Previous') ?>" />
  <?php end_slot() ?>
  <?php include_partial('steps_footer') ?>
</form>
