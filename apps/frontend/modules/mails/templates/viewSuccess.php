<?php use_helper('Date') ?>

<?php slot('title', __('View sent email')) ?>

<h2><?php echo __('Sender') ?></h2>
<p><?php echo $mail['Sender']['username'] ?></p>

<h2><?php echo __('Sent to') ?></h2>
<p><?php echo $mail['recipients_label'] ?></p>

<h2><?php echo __('Sent date') ?></h2>
<p><?php echo format_datetime($mail['created_at'], 'g') ?></p>

<h2><?php echo __('Subject') ?></h2>
<p><?php echo $mail['subject'] ?></p>

<h2><?php echo __('Message') ?></h2>
<p><?php echo $mail['message'] ?></p>
