<?php get_header(); ?>

<div id="primary">
  <div id="content" role="main"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
    <script type="application/javascript">
  jQuery(document).ready(function($){
                var _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;
                $('#btn_upload').click(function(e) {
                var send_attachment_bkp = wp.media.editor.send.attachment;
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media ) {
                $("#txt_imageurl").val(attachment.url);
                } else {
                return _orig_send_attachment.apply( this, [props, attachment] );
                };
                }
                wp.media.editor.open(this);
                return false;
        });
        });
    </script>
    <?php 
        if(function_exists( 'wp_enqueue_media' )){
                wp_enqueue_media();
                }else{
                wp_enqueue_style('thickbox');
                wp_enqueue_script('media-upload');
                wp_enqueue_script('thickbox');
                }?>
    <div class="uploader">
      <input type="text" name="txt_imageurl" id="txt_imageurl" />
      <input type="button" class="button" name="btn_upload" id="btn_upload" value="Upload" />
    </div>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->

<?php get_footer(); ?>
