<?php if ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()): ?>
<?php slot('title', __('Register %user\'s damage', array('%user' => $form->getObject()->getClaimant()->getUsername()))) ?>
<?php else: ?>
<?php slot('title', __('Register your climate damage(s) here!')) ?>
<?php endif; ?>

<h2><?php echo __('Confirmation') ?></h2>

<?php slot('steps', get_partial('steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('damage_edit', $form->getObject())) ?>
  <h3><?php echo __('Validation code') ?></h3>
  <p><?php echo __('Please note the following reference code for future modifications with regard to this loss or damage. It can also serve as alternative login attached with your password:') ?></p>
  <p style="font-size: 130%"><?php echo $form->getObject()->getValidationcode() ?></p>
  <table>
    <?php echo $form[$form->getCurrentStepName()] ?>
  </table>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <i><?php echo __('(You can register as many as you want)') ?></i>
    <?php if ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()): ?>
    <?php echo link_to(__('Register another damage'), 'user_damage_new', $form->getObject()->getClaimant(), array('class' => 'button button_alt')) ?>
    <?php else: ?>
    <?php echo link_to(__('Register another damage'), 'damage_new', array(), array('class' => 'button button_alt')) ?>
    <?php endif; ?>
    <input type="submit" name="previous" value="<?php echo __('<< Previous') ?>" />
    <input type="submit" name="save" value="<?php echo __('Submit story >>') ?>" />
  <?php end_slot() ?>
  <?php include_partial('steps_footer', array('no_left' => true)) ?>
</form>
