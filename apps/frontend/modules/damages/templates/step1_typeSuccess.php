<?php use_helper('OrdinalNumber') ?>

<?php
  $title = ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()) ?
    __('Register %user\'s damage', array('%user' => $form->getObject()->getClaimant()->getUsername())) :
    __('Register your climate damage(s) here!');
  
  $userLabel = ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()) ?
    $form->getObject()->getClaimant()->getUsername().'\'s' :
    'your';
  
  $ordinalImportance = ordinalNumber($form->getObject()->getImportance());
?>

<?php slot('title', $title) ?>

<h2 class="importance">
  <?php echo __('What is %user <b>%importance most</b> important loss or damage?',
                array('%user' => $userLabel,
                      '%importance' => ($ordinalImportance == '1st' ? '' : $ordinalImportance))) ?>
</h2>

<?php slot('steps', get_partial('steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php if ($form->getObject()->isNew()): ?>
<?php echo $form->renderFormTag(url_for('damage_new')) ?>
  <?php echo $form[$form->getCurrentStepName()]['type_id'] ?>
  <?php echo $form[$form->getCurrentStepName()]['type_id']->renderError() ?>
<?php else: ?>
<?php echo $form->renderFormTag(url_for('damage_edit', $form->getObject())) ?>
<?php endif; ?>
  <table>
    <?php include_partial('fields_row_with_hidden', array('field' => $form[$form->getCurrentStepName()]['cause_id'], 'other' => $form[$form->getCurrentStepName()]['cause_other'])) ?>
    <?php include_partial('fields_row', array('field' => $form[$form->getCurrentStepName()]['occurred_at'])) ?>
    <?php include_partial('fields_address_state', array('field' => $form[$form->getCurrentStepName()]['Where'])) ?>
  </table>
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="next" value="<?php echo __('Next >>') ?>" />
  <?php end_slot() ?>
  <?php include_partial('steps_footer') ?>
</form>
