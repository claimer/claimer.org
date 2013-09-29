<?php slot('title', __('New claimant')) ?>

<?php include_partial('users/form', array('form' => $form, 'route' => url_for('claimant_new'))) ?>
