<?php use_javascript('jqplot/jquery.jqplot.js') ?>
<?php use_javascript('jqplot/plugins/jqplot.barRenderer.min.js') ?>
<?php use_javascript('jqplot/plugins/jqplot.categoryAxisRenderer.min.js') ?>
<?php use_javascript('jqplot/plugins/jqplot.pointLabels.min.js') ?>
<?php use_stylesheet('/js/jqplot/jquery.jqplot.css') ?>

<?php slot('include_js') ?>
<script type="text/javascript">
$(function() {
  $.jqplot.config.enablePlugins = true;
  $.jqplot('damages_by_type', [[
      <?php echo implode(',', array_map('intval', $chartByType['data']->getRawValue())); ?>
    ]],
    {
      grid: {
        shadow: false,
        background: '#ffffff',
        borderColor: '#cccccc'
      },
      seriesDefaults: {
        renderer: $.jqplot.BarRenderer,
        rendererOptions: {
          varyBarColor: true,
          highlightMouseOver: false
        }
      },
      axes: {
        xaxis: {
          renderer: $.jqplot.CategoryAxisRenderer,
          ticks: [
            <?php echo implode(',', array_map('json_encode', array_map('esc_specialchars', $chartByType['ticks']->getRawValue()))); ?>
          ],
          tickOptions: {
            showGridline: false
          }
        },
        yaxis: {
          tickOptions: {
            show: false
          }
        }
      }
    }
  );
});
</script>
<?php end_slot() ?>

<div id="damages_by_type" style="height: 200px; width: 100%;"></div>
