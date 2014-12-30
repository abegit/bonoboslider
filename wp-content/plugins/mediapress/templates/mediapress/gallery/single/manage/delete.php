<form method="post" action="" id="mpp-gallery-edit-form" class="mpp-form mpp-form-stacked mpp-gallery-delete-form">
<div class="mpp-notice mpp-warning">
	
	<p> <?php _e( 'Are you sure you want to delete this gallery? You will loose all the media!', 'mediapress' );?></p>
	
	<input type="checkbox" for="mpp-delete-gallery-agree" value="1" name="mpp-delete-agree" />
	<input type='hidden' name='mpp-action' value='delete-gallery' />
	<input type='hidden' name='gallery_id' value="<?php echo mpp_get_current_gallery_id() ;?>" />
	<?php wp_nonce_field( 'mpp-delete-gallery', 'mpp-nonce' );?>
	<button type="submit" class="mpp-button mpp-button-warning"> <?php _e( 'Yes, I understand and I want to delete!', 'mediapress' );?></button>
</div>
</form>	