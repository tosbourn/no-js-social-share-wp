<?php
/**
 * Plugin Name: No JS Social Share
 * Plugin URI: http://tosbourn.com/no-js-social-share
 * Description: This plugin adds sharing functionality to your pages that doesn't require JavaScript.
 * Version: 0.1
 * Author: Toby Osbourn
 * Author URI: http://tosbourn.com
 * License: GPL2
 */

/*  Copyright 2013  Toby Osbourn  (email : toby.osbourn@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!function_exists(no_js_social_share)) {
  function no_js_social_share($content) {

    $html_url   = urlencode(get_permalink());
    $html_title = urlencode(substr(get_the_title(), 0, 79));

    $facebook = '<a class="social facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='.$html_url.'">Facebook</a>';

    $twitter = '<a class="social twitter" target="_blank" href="https://twitter.com/intent/tweet?text='.$html_title.'&url='.$html_url.'">Twitter</a> ';

    $google_plus = '<a class="social google" target="_blank" href="https://plus.google.com/share?url='.$html_url.'">G+</a> ';

    $linkedIn = '<a class="social linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.$html_url.'&title='.$html_title.'&summary='.$html_title.'&source='.$html_url.'">LinkedIn</a>';

    $reddit = '<a class="social reddit" target="_blank" href="http://www.reddit.com/submit?url='.$html_url.'">Reddit</a>';

    $hackernews = '<a class="social hackernews" target="_blank" href="http://news.ycombinator.com/submitlink?u='.$html_url.'&t='.$html_title.'">HN</a>';

    $buffer = '<a class="social buffer" target="_blank" href="http://bufferapp.com/add?text='.$html_title.'&url='.$html_url.'">Buffer</a>';

    $start = '<section class="socialshares">Share this on';

    $end = '</section>';

    if(!is_page()) {
      $content = $content.$start.$facebook.$twitter.$google_plus.$linkedIn.$reddit.$hackernews.$buffer.$end;
    }

    return $content;

  }

  wp_register_style( 'no_js_social_share_css', plugins_url('stylesheet.css', __FILE__) );
  wp_enqueue_style(  'no_js_social_share_css' );

  add_filter('the_content', 'no_js_social_share');
}

