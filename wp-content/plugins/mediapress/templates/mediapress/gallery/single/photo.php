<?php
/**
 * @package mediapress
 * @subpackage mpp-base
 * 
 * Lists all the Photos
 *	
 * Fallback single Gallery View
 */
?>

<?php if( mpp_have_media() ): ?>

    <?php if( mpp_user_can_list_media( mpp_get_current_gallery_id() ) ):?>

		<div class='mpp-g mpp-item-list mpp-media-list mpp-photos-list mpp-single-gallery-media-list mpp-single-gallery-photos-list'>
			
			<?php mpp_get_template_part( 'gallery/media/loop', mpp_get_gallery_type() );?>
			
		</div>
			
		<?php mpp_media_pagination();?>

		<?php mpp_locate_template( array('gallery/activity/gallery-activity.php'), true );?>


    <?php else:?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
                
            </div>

    <?php endif;?>
        
<?php else:?>

    <div class="mpp-notice mpp-no-gallery-notice">
        <p> <?php _ex( 'Nothing to see here!', 'No media Message', 'mediapress' ); ?> 
    </div>

<?php endif;?>