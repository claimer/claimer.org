<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
  <?php foreach ($pager->getLinks() as $page): ?>
  <?php if ($page == $pager->getPage()): ?>
  <?php echo $page ?>
  <?php else: ?>
  <a href="<?php echo $route ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
  <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php endif; ?>

