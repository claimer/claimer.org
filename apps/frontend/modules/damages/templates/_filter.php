<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag($route) ?>
  <table>
    <?php if(isset($form['manager'])): ?>
    <?php echo $form['manager']->renderRow() ?>
    <?php endif ?>
    <?php if(isset($form['claimant'])): ?>
    <?php echo $form['claimant']->renderRow() ?>
    <?php endif ?>
    <?php echo $form['type_id']->renderRow() ?>
    <?php echo $form['cause_id']->renderRow() ?>
    <?php echo $form['Value']->renderRow() ?>
    <?php echo $form['Where']->renderRow() ?>
    <?php echo $form['occurred_at']->renderRow() ?>
    <?php echo $form['created_at']->renderRow() ?>
    <?php echo $form['updated_at']->renderRow() ?>
    <?php echo $form->renderHiddenFields() ?>
    <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="<?php echo __('Filter') ?>" />
        <input type="submit" name="reset" value="<?php echo __('Reset') ?>" />
      </td>
    </tr>
  </table>
</form>


