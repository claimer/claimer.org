<?php slot('title', __('Send an email to claimants')) ?>

<?php include_partial('mails/mail', array('form' => $form,
                                          'route' => url_for('mail_managed'))) ?>
