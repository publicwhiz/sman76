<?php
global $educavo_option;
$rs_top_search = get_post_meta(get_queried_object_id(), 'select-search', true);
//search page here
if(!empty($educavo_option['off_search'])):
    $sticky_search = $educavo_option['off_search'];
else:
    $sticky_search ='';
endif;
if(($sticky_search == '1') || ($rs_top_search == 'show') ):
 ?>
	<div class="sticky_form">
		<div class="sticky_form_full">
		  <?php get_search_form(); ?> 
		</div><i class="educavoicon-cross close-search sticky_search sticky_form_search"></i>
		
	</div>
<?php endif; ?>

