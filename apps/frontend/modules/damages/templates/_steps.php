<div class="center">
  <?php $steps = array(0 => 0, 1 => 1, 2 => 2, 3 => 2, 4 => 2, 5 => 3); ?>
  <?php for ($i = ($sf_user->isAuthenticated()) ? 1: 0; $i < 4; $i++): ?>
    <?php $nb = ($steps[$step] == $i) ? $i : 'i'.$i; ?>
    <img src="/images/step<?php echo $nb; ?>.png" alt="<?php echo $i ?>" /> 
  <?php endfor; ?>
</div>
