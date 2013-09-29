$(document).ready(function() {
	$(".with-hidden").change(function() {
    if ($('.with-hidden option:selected').text() == "Other") $('.with-hidden').parent().find('.hidden').fadeIn();
		else $('.with-hidden').parent().find('.hidden').fadeOut();
	});
  
  $("input[type=button][name=new_coowner]").click(function() {
    $("#claimer_damage_step2_coowners_new_coowner").val(1);
    
    $(this).closest('form').submit();
  });
  
  $("input[type=button][name=delete_coowner]").click(function() {
    $("#claimer_damage_step2_coowners_delete_coowner").val(parseInt($(this).data('coowner')));
    
    $(this).closest('form').submit();
  });
});
