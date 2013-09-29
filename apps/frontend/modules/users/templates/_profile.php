<table>
  <?php if (! $form->getObject()->isNew()): ?>
  <tr>
    <th><?php echo __('Username') ?></th>
    <td>
      <?php echo $form->getObject()->getUsername() ?>
    </td>
  </tr>
  <?php else: ?>
  <tr>
    <th><?php echo $form['username']->renderLabel() ?></th>
    <td>
      <?php echo $form['username']->renderError() ?>
      <?php echo $form['username'] ?>
    </td>
  </tr>
  <?php endif ?>
  <?php if (isset ($form['Profile']['manager_id'])): ?>
  <tr>
    <th><?php echo $form['Profile']['manager_id']->renderLabel() ?></th>
    <td>
      <?php echo $form['Profile']['manager_id']->renderError() ?>
      <?php echo $form['Profile']['manager_id'] ?>
    </td>
  </tr>
  <?php endif ?>
  <tr>
    <th><?php echo $form['password']->renderLabel() ?></th>
    <td>
      <?php echo $form['password']->renderError() ?>
      <?php echo $form['password'] ?>
      <?php if ($form->getObject()->isNew()): ?><small>* mandatory</small><?php endif; ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['password_confirmation']->renderLabel() ?></th>
    <td>
      <?php echo $form['password_confirmation']->renderError() ?>
      <?php echo $form['password_confirmation'] ?>
      <?php if ($form->getObject()->isNew()): ?><small>* mandatory</small><?php endif; ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['first_name']->renderLabel() ?></th>
    <td>
      <?php echo $form['first_name']->renderError() ?>
      <?php echo $form['first_name'] ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['last_name']->renderLabel() ?></th>
    <td>
      <?php echo $form['last_name']->renderError() ?>
      <?php echo $form['last_name'] ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['email_address']->renderLabel() ?></th>
    <td>
      <?php echo $form['email_address']->renderError() ?>
      <?php echo $form['email_address'] ?>
      <?php if ($form->getObject()->isNew()): ?><small>* mandatory</small><?php endif; ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['Profile']['email_alt']->renderLabel() ?></th>
    <td>
      <?php echo $form['Profile']['email_alt']->renderError() ?>
      <?php echo $form['Profile']['email_alt'] ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['Profile']['phone']->renderLabel() ?></th>
    <td>
      <?php echo $form['Profile']['phone']->renderError() ?>
      <?php echo $form['Profile']['phone'] ?>
    </td>
  </tr>
  <tr>
    <th><?php echo $form['Profile']['phone_alt']->renderLabel() ?></th>
    <td>
      <?php echo $form['Profile']['phone_alt']->renderError() ?>
      <?php echo $form['Profile']['phone_alt'] ?>
    </td>
  </tr>
  <?php include_partial('users/address', array('address' => $form['Profile']['Address'])) ?>
  <?php if (isset($form['is_active'])): ?>
  <?php echo $form['is_active']->renderRow() ?>
  <?php endif; ?>
  <?php if (isset($form['groups_list'])): ?>
  <?php echo $form['groups_list']->renderRow() ?>
  <?php endif; ?>
</table>
