<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag($route) ?>
  <?php include_partial('users/profile', array('form' => $form)) ?>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="submit" value="<?php echo __('Submit >>') ?>" />
  <?php end_slot() ?>
  <?php include_partial('damages/steps_footer') ?>
</form>
