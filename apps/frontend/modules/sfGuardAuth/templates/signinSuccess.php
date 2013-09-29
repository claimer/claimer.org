<?php slot('title', __('Login')) ?>

<?php echo $form->renderFormTag(url_for('sf_guard_signin')) ?>
  <table>
    <?php echo $form ?>
  </table>
  
  <input type="submit" name="submit" value="<?php echo __('Sign in') ?>" />
  <a href="<?php echo url_for('@login_validationcode') ?>"><?php echo __('Validation code login') ?></a> | 
  <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?') ?></a>
</form>
