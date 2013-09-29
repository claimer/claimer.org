<?php slot('title', __('New user')) ?>

<?php include_partial('users/form', array('form' => $form, 'route' => url_for('user_new', $form->getObject()))) ?>
