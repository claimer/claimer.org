<?php if ($sf_user->getGuardUser()->getId() != $form->getObject()->getClaimant()->getId()): ?>
<?php slot('title', __('Register %user\'s damage', array('%user' => $form->getObject()->getClaimant()->getUsername()))) ?>
<?php else: ?>
<?php slot('title', __('Register your climate damage(s) here!')) ?>
<?php endif; ?>

<h2><?php echo __('Upload documents about your damage') ?></h2>

<?php slot('steps', get_partial('steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('damage_edit', $form->getObject())) ?>
  <table>
    <?php $embeddedForms = $form->getEmbeddedForms(); ?>
    <?php $typeForms = $embeddedForms[$form->getCurrentStepName()]->getEmbeddedForms(); ?>
    <?php foreach ($embeddedForms[$form->getCurrentStepName()]->getDocumentsTypesLabels() as $type => $label): ?>
    <tr>
      <th><?php echo $label ?></th>
    </tr>
    <tr>
      <td colspan="2">
        <table>
        <?php $documentForms = $typeForms[$type]->getEmbeddedForms(); ?>
        <?php foreach ($form[$form->getCurrentStepName()][$type] as $index => $document): ?>
        <tr>
          <?php if (! $documentForms[$index]->getObject()->isNew()): ?>
          <td>
            <?php echo link_to(
              __('View document'), 
              '@damage_document_view?validationcode='.$form->getObject()->getValidationCode().'&md5_fname='.md5($document['filename']->getValue()),
              array('method' => 'get')
            ) ?>
            |
            <?php echo $document['filename']->render() ?>
          </td>
          <td>
            <?php echo $documentForms[$index]->getObject()->getDescription() ?>
          </td>
          <?php else: ?>
          <td>
            <?php echo $document['filename'] ?>
          </td>
          <td>
            <?php echo $document['description']->renderLabel() ?>
            <?php echo $document['description'] ?>
          </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        </table>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="save" value="<?php echo __('Save documents') ?>" class="submit_alt" />
    <input type="submit" name="previous" value="<?php echo __('<< Previous') ?>" />
    <input type="submit" name="next" value="<?php echo __('Next >>') ?>" />
  <?php end_slot() ?>
  <?php include_partial('steps_footer') ?>
</form>
