<?php if ($sf_user->getGuardUser()->getId() == $form->getObject()->getId()): ?>
<?php slot('title', __('Edit your profile')) ?>
<?php else: ?>
<?php slot('title', __('Edit user')) ?>
<?php endif; ?>

<?php include_partial('users/form', array('form' => $form, 'route' => url_for('user_edit', $form->getObject()))) ?>

<?php if ($sf_user->getGuardUser()->getId() == $form->getObject()->getId()): ?>
<p>
  <?php echo link_to(__('Delete your account'), 'user_delete', $sf_user->getGuardUser(), array('method' => 'delete', 'confirm' => 'Your account will be deleted. Are you sure?')) ?>
</p>
<?php endif; ?>
