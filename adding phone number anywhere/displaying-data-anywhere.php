<?php

/*
Plugin Name: Display Data Anywhere
Description: A truly best plugin by Vahid Sediqi
Version: 1.0
Author: Vahid Sediqi
Author URI: https://vahidsediqi.com
*/


// Adding action to add the button after every post content
add_filter('the_content', 'addPhoneNumber');

function addPhoneNumber($content){

    if(is_single() && is_main_query()){
        return $content . 'Call Us Now: 24/7 <button>+436641077144</button>';
    }
}


// To add the button at the end of all pages
// add_filter('the_content', 'addPhoneNumber');

// function addPhoneNumber($content){

//     if(is_page() && is_main_query()){
//         return $content . 'Call Us Now: 24/7 <button>+436641077144</button>';
//     }
// }


// ----------------------------------------------------------

// Adding short code to add the number anywhere enywhere

// add_shortcode( 'add-phone-number', 'addPhoneNumber');

// function addPhoneNumber(){
//     return 'Call Us Now: 24/7 <button>+436641077144</button>';
// }