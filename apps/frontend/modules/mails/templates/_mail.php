<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag($route) ?>
  <table>
    <?php echo $form['subject']->renderRow() ?>
    <?php echo $form['message']->renderRow() ?>
    <?php if (isset($form['groups_list'])): ?>
    <?php echo $form['groups_list']->renderRow() ?>
    <?php endif; ?>
  </table>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="submit" value="<?php echo __('Send email') ?>" />
  <?php end_slot() ?>
  <?php include_partial('damages/steps_footer') ?>
</form>
