<?php

/*
Plugin Name: Word Count Plugin
Description: This plugin will count all the words included in your post | By Vahid Sediqi
Version: 1.0
Author: Vahid Sediqi
Author URI: https://vahidsediqi.com
*/

class WordCountAndTimePlugin{
 function __construct(){
    add_action( 'admin_menu', array($this, 'adminPage'));
    // Below action about the setting funtions that register settings from user
    add_action('admin_init', array($this, 'settings'));
 }


//  Setting function will register users setting from dashtboard the first setting is Display Location
 function settings(){
   add_settings_section( 'wcp_first_section', null, null, 'word-count-settings-page');
  //  this funtion will add html form to the setting
  // 1 arg is the plugin name or the group
  // 2 arg is the field name or label in dashboard
  // 3 arg is the html template for form fields
  // 4 arg is the slug
  // 5 is the section name we make it above
   add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'),'word-count-settings-page', 'wcp_first_section');
    //  1 arg is the name of the group that is belogs to
    // 2 erg is the actual name for the setting 
    register_setting( 'wordcoundplugin', 'wcp_location', array('sanitize_callback' => 'sanitize_text_field' , 'default' => '0')); 
 }

 function locationHTML () { ?>
   <select name="wcp_location">
     <option value="x">Select</option>
     <option value="0">Beginning of post</option>
     <option value="1">End of post</option>
   </select>
 <?php }
/* This function will display our content under the wordpress dashboard setting */
 function adminPage(){
        /*
    TIPS
        1 arg = page title in browser
        2 arg = the title in wordpress dashboard setting menu
        3 arg works with permissions and capibality (which user role can see this)
        4 arg is the slug or url after domain name like website.com/pluginSettin
        5 arg is the function name that has the job to output the HTML in our wordpress dashboard
    */
    add_options_page('Word Count Settings', 'V - Sediqi', 'manage_options', 'word-count-settings-page', array($this, 'HTMLtemplate'));
}

function HTMLtemplate(){ ?>
  <div class="wrap">
    <h1>Word Cound Plugin By: Vahid Sediqi</h1>
    <form action="options.php" method="POST">
       <?php
       settings_fields( 'wordcoundplugin' );
         do_settings_sections('word-count-settings-page');
         submit_button();
       ?>
    </form>
  </div>
<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin ();

