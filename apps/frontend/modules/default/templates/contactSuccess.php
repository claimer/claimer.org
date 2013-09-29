<?php slot('title', __('Questions or comments ?')) ?>

<?php if (! $sf_user->hasFlash('notice')): ?>
<p><?php echo __('For any enquiry, please use our contact form or write to:'); ?></p>
<p>
	John Tulayev<br />
	External Relations Manager<br />
	+49 157 7658 3334<br />
	<script type="text/javascript">eval(unescape('d%6fc%75%6de%6e%74%2e%77%72%69%74e%28%27%3Ca%20%68%72ef%3D%22%26%23109%3Ba%26%23105%3B%6c%26%23116%3B%26%23111%3B%3A%26%23106%3B%26%23111%3B%26%23104%3B%26%23110%3B%26%2364%3B%26%2399%3B%26%23108%3B%26%2397%3B%26%23105%3B%26%23109%3B%26%23101%3B%26%23114%3B%26%2346%3B%26%23111%3B%26%23114%3B%26%23103%3B%22%3E%6a%6f%68%6e%40c%6ca%69%6de%72%2e%6f%72%67%3C%2fa%3E%27%29%3B'));</script>
</p>

<div class="separator2"></div>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('contact')) ?>
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="<?php echo __('Send email') ?>" class="submit" />
      </td>
    </tr>
  </table>
</form>
<?php endif; ?>
