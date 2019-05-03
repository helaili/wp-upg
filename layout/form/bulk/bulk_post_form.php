<script src="<?php echo plugins_url() .'/'. upg_FOLDER.'/layout/form/bulk/dropzone.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo plugins_url() .'/'. upg_FOLDER.'/layout/form/bulk/dropzone.css'; ?>">


<?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'wp-upg-pro/wp-upg-pro.php' ) ) 
    {
        include_once( WP_PLUGIN_DIR. '/wp-upg-pro/bulk_upload_layout.php' );
        
    }
    else
    {
        function upg_bulk_post_layout($upload_path,$preview,$form_name,$form_attach_id) 
        {
            //Empty function for free UPG version.
        }
        echo "Bulk layout is available only to <a href='https://odude.com/product/wp-upg-pro/'>UPG Pro version</a>. <hr><b>Image droped here will not get updated. It is only for demo propose. </b>";
    }

    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
    $resultUpload = upg_bulk_post_layout($upload_path,$preview,$form_name,$form_attach_id);
?>

    <form method="POST" enctype="multipart/form-data" action="." class="dropzone pure-form">
   
   
      <input  id="name" name="user-submitted-title" type="text" value="" placeholder="<?php _e('Post Title', 'wp-upg'); ?>" required>
       <?php echo upg_droplist_category(); ?>
       <?php
		do_action( "upg_submit_form");
		?>
		
       <legend></legend>
      

        <div class="fallback">
	     <input id="file" name="user-submitted-image" type="file" multiple /> 
	</div>


    <?php wp_nonce_field('upg-nonce', 'upg-nonce', false); ?>
			
			<input type="hidden" name="preview" value="<?php echo $preview; ?>">
			<input type="hidden" name="form_name" value="<?php echo $form_name; ?>">
			<input type="hidden" name="form_attach" value="<?php echo $form_attach_id; ?>">
    
   
     </form>
     <p class="max-upload-size"><?php printf( __( 'Maximum upload file size: %s.' ), esc_html( size_format( wp_max_upload_size() ) ) ); ?></p>


<?php
if(isset($options['my_gallery']))
{
    //echo $options['my_gallery']."---";
    echo "<a href='".esc_url( get_page_link( $options['my_gallery'] ) )."' class=\"pure-button\">".__('My Gallery','wp-upg')."</a><br><br>";
}

?>