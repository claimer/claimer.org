<?php slot('title', __('Validation code login') ) ?>

<p>
  <?php echo __('Here you can login with the validation code of one of your damages.') ?>
</p>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('login_validationcode')) ?>
  <table>
    <?php include_partial('damages/fields_row', array('field' => $form['validationcode'])) ?>
    <?php include_partial('damages/fields_row', array('field' => $form['password'])) ?>
  </table>
  <?php echo $form->renderHiddenFields() ?>
  
  <p>
    <input type="submit" name="submit" value="<?php echo __('Sign in') ?>" />
  </p>
</form>
