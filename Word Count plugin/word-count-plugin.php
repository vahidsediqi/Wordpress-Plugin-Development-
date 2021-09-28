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
    add_action('admin_init', array($this, 'settings'));
 }


 function settings(){
    //  1 arg is the name of the group that is belogs to

    register_setting( 'wordcoundplugin', 'wcp_location', array('sanitize_callback' => 'sanitize_text_field' , 'default' => '0')); 
 }
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
    <h1>Hay You!!!!</h1>
    <h4>This plugin is made by vahid sediqi</h4>
  </div>
<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin ();

