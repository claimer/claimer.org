<?php slot('title', __('Send an email to users')) ?>

<?php include_partial('mails/mail', array('form' => $form,
                                          'route' => url_for('mail_users'))) ?>
