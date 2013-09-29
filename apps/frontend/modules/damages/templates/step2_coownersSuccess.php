<?php use_javascript('damages.js') ?>

<?php if ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()): ?>
<?php slot('title', __('Register %user\'s damage', array('%user' => $form->getObject()->getClaimant()->getUsername()))) ?>
<?php else: ?>
<?php slot('title', __('Register your climate damage(s) here!')) ?>
<?php endif; ?>

<h2><?php echo __('Define the co-owners') ?></h2>

<?php slot('steps', get_partial('steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('damage_edit', $form->getObject())) ?>
  <?php if($form[$form->getCurrentStepName()]['Coowners']): ?>
    <?php
      $embeddedForms = $form->getEmbeddedForms();
      $stepEmbeddedForms = $embeddedForms[$form->getCurrentStepName()]->getEmbeddedForms();
      $coowners = $stepEmbeddedForms['Coowners']->getEmbeddedForms();
    ?>
    <?php foreach ($form[$form->getCurrentStepName()]['Coowners'] as $index => $coowner): ?>
      <h3><?php echo __('Co-owner %index', array('%index' => $index + 1)) ?></h3>
      <input type="button" name="delete_coowner" class="button right" data-coowner="<?php echo $coowners[$index]->getObject()->getCoownerCode() ?>" value="<?php echo __('Delete co-owner') ?>" />
      <?php include_partial('coowner', array('form' => $coowner)) ?>
    <?php endforeach; ?>
  <?php endif ?>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="button" name="new_coowner" class="button button_alt left" value="<?php echo __('Insert new co-owner') ?>" />
    <input type="submit" name="next" value="<?php echo __('Next >>') ?>" class="right" />
    <input type="submit" name="previous" value="<?php echo __('<< Previous') ?>" />
  <?php end_slot() ?>
  <?php include_partial('steps_footer') ?>
</form>
