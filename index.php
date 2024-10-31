<?php
/*
Plugin Name: Owner Info Widget
Plugin URI: http://www.pradipdebnath.com
Description: This plugin enables the ability to add/display website brand/owner information on a widget.
Author: Pradip Debnath
Version: 1.0
Author URI: http://www.pradipdebnath.com/
*/

class Pdn_Owner_info_widget extends WP_Widget {
    
    function __construct() {
        $params = array(
                'name' => 'Owner Info Widget',
                'description' => 'Display site owner\'s info',
            );
        parent::__construct('Pdn_Owner_info_widget', '', $params);
    }
    
    public function form($instance) {
        extract($instance);
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('title'); ?>" 
           name="<?php echo $this->get_field_name('title') ?>" 
           value="<?php if( isset($title) ) echo esc_attr($title); ?>" />
</p>
    
<p>
    <label for="<?php echo $this->get_field_id('owner_bio'); ?>">Owner Bio : </label>
    <textarea 
              class="widefat" 
              id="<?php echo $this->get_field_id('owner_bio'); ?>" 
              name="<?php echo $this->get_field_name('owner_bio') ?>" rows="5"><?php if( isset($owner_bio) ) echo esc_attr($owner_bio); ?></textarea>
</p>

<p><a href="#" class="owner-photo-upload-button" rel="<?php echo $this->get_field_id('owner_bio_img'); ?>">Click here to upload a new image.</a> You can also paste in an image URL below.</p>
        
<p>
    <label for="<?php echo $this->get_field_id('owner_bio_img'); ?>">Owner/Brand Image</label>
    <input
        class="widefat"
        type="text"
        placeholder="Add Image URL"
        id="<?php echo $this->get_field_id('owner_bio_img'); ?>"
        name="<?php echo $this->get_field_name('owner_bio_img'); ?>"
        value="<?php if(isset($owner_bio_img)) echo esc_attr($owner_bio_img); ?>"/>
</p>

<p>
    <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('facebook'); ?>" 
           name="<?php echo $this->get_field_name('facebook') ?>" 
           value="<?php if( isset($facebook) ) echo esc_attr($facebook); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('twitter'); ?>" 
           name="<?php echo $this->get_field_name('twitter') ?>" 
           value="<?php if( isset($twitter) ) echo esc_attr($twitter); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('linkedin'); ?>" 
           name="<?php echo $this->get_field_name('linkedin') ?>" 
           value="<?php if( isset($linkedin) ) echo esc_attr($linkedin); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('gplus'); ?>">Google+ URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('gplus'); ?>" 
           name="<?php echo $this->get_field_name('gplus') ?>" 
           value="<?php if( isset($gplus) ) echo esc_attr($gplus); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('github'); ?>">GitHub URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('github'); ?>" 
           name="<?php echo $this->get_field_name('github') ?>" 
           value="<?php if( isset($github) ) echo esc_attr($github); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('wp'); ?>">WordPress URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('wp'); ?>" 
           name="<?php echo $this->get_field_name('wp') ?>" 
           value="<?php if( isset($wp) ) echo esc_attr($wp); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('instagram'); ?>" 
           name="<?php echo $this->get_field_name('instagram') ?>" 
           value="<?php if( isset($instagram) ) echo esc_attr($instagram); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('youtube'); ?>">YouTube URL: </label>
    <input 
           class="widefat" 
           id="<?php echo $this->get_field_id('youtube'); ?>" 
           name="<?php echo $this->get_field_name('youtube') ?>" 
           value="<?php if( isset($youtube) ) echo esc_attr($youtube); ?>" />
</p>
        <?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $google_partner = plugin_dir_url(__FILE__) . '/assets/google-partner.jpg';
                
        echo $before_widget;
            echo $before_title . $title . $after_title;
            if( isset($owner_bio_img) && $owner_bio_img != '' ) {
                echo "<img src='$owner_bio_img' class='owner-photo' />";
            }
            echo "<p>$owner_bio</p>";
        
            echo "<a href='https://www.google.com/partners/?hl=en-GB#i_profile;idtf=106211088749033533053;' target='_blank'><img src='$google_partner' width='80%' class='img-responsive google-partner' /></a>";
            
            echo "<ul class='social-links'>";
            if(isset($facebook) && ($facebook!='')) echo '<li><a href="'.$facebook.'" title="Facebook" class="fb" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($twitter) && ($twitter!='')) echo '<li><a href="'.$twitter.'" title="Twitter" class="twitter" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($linkedin) && ($linkedin!='')) echo '<li><a href="'.$linkedin.'" title="LinkedIn" class="linkedin" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($gplus) && ($gplus!='')) echo '<li><a href="'.$gplus.'" title="Google+" class="gplus" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($github) && ($github!='')) echo '<li><a href="'.$github.'" title="GitHub" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($wp) && ($wp!='')) echo '<li><a href="'.$wp.'" title="WordPress Developer Profile" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-wordpress fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($instagram) && ($instagram!='')) echo '<li><a href="'.$instagram.'" class="instagram" title="Instagram" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            if(isset($youtube) && ($youtube!='')) echo '<li><a href="'.$youtube.'" class="youtube" title="YouTube" target="_blank">
  <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
</span>
</a></li>';
            echo "</ul>";
            //echo '<button type="button" class="hire-me-btn btn-block" data-toggle="modal" data-target="#hireMeModal">Hire Me</button>';
        echo $after_widget;
        
        add_action('wp_footer', array($this, 'footer_func'));
    }
    
    function footer_func() {
        ?>
<!-- Modal -->
<div class="modal hire-me-modal fade" id="hireMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hire Me</h4>
      </div>
      <div class="modal-body">
          <div class="hire-loader pdn-hide"><img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/loader.gif"> </div>
          <div class="hire-success-msg pdn-hide">Thank you for your hiring query. <button data-dismiss="modal" aria-label="Close">Close</button> </div>
          <form id="hire_me_form" action="<?php echo admin_url('admin-ajax.php'); ?>">
              <p>
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name">
              </p>
                
              <p>
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email">
              </p>
                
              <p>
                  <label for="mobile">Mobile</label>
                  <input type="text" name="mobile" id="mobile">
              </p>
                
              <p>
                  <label for="requirement">Requirement</label>
                  <select name="requirement" id="requirement">
                      <option value="none">Select Your Requirement</option>
                      <option value="WordPress Site Development">WordPress Site Development</option>
                      <option value="Web Design">Web Design</option>
                      <option value="SEO">SEO</option>
                  </select>
              </p>
              <div class="clear"></div>
              <p>
                  <label for="description">Description</label>
                  <textarea name="description" id="description"></textarea>
              </p>
                
              <p>
                  <?php wp_nonce_field( 'new_hire_me', 'new_hire_me_nonce' ); ?>
                  <input type="hidden" name="action" value="hire_me_submit">
                  <input type="submit" name="submit" id="hire_me_submit" value="submit">
              </p>
          </form>
      </div>
      
    </div>
  </div>
</div>
        <?php
    }
}

/*require_once( plugin_dir_path(__FILE__) . 'classes/db.class.php' );
require_once( plugin_dir_path(__FILE__) . 'classes/hire-operation.class.php' );
add_action('init', 'owner_info_plugin_init');

function owner_info_plugin_init() {
    new Hire_me_enquiry();
}

$hire_me_db = new Hire_me_db();

//These hooks don' work on any subfolders of plugin directory, so we have created object of the class and then pass methods to these hooks.
register_activation_hook( __FILE__, array( &$hire_me_db, 'create_table' ) );*/


add_action('widgets_init', 'pdn_owner_info_register_widget');
add_action('admin_init', 'pdn_owner_info_register_scripts');
add_action('wp_enqueue_scripts','pdn_owner_info_front_scripts');

function pdn_owner_info_register_widget() {
    register_widget('Pdn_Owner_info_widget');
}
function pdn_owner_info_register_scripts() {
    # Include thickbox on widgets page
        if($GLOBALS['pagenow'] == 'widgets.php')
        {
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('owner-info-widget',  plugin_dir_url(__FILE__).'assets/widget.js');
        }
}

function pdn_owner_info_front_scripts() {
    wp_enqueue_style('pdn-owner-bio-style', plugin_dir_url(__FILE__) . 'assets/owner-bio-style.css');
    wp_enqueue_style('pradip-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_script( 'pradip-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );
    /*wp_enqueue_script( 'pradip-jquery-validator', plugin_dir_url(__FILE__) . 'assets/jquery.validate.min.js', array(), '1.1.6', true );
    wp_enqueue_script( 'pradip-hire-submit', plugin_dir_url(__FILE__) . 'assets/form-submit.js', array(), '1.0', true );*/
}

?>