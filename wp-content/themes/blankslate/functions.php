<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( ! isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer_scripts' );
function blankslate_footer_scripts() {
?>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

function custom_login_logo() {
    echo '<style type="text/css">'.
            'h1 a {background-image:url('.get_bloginfo('template_directory').'/logo.png) !important; }'.
        '</style>';
}

add_action('login_head', 'custom_login_logo');

// membuat fungsi recent posts
function recent_posts($attr, $content = null) {
    global $post;

    // Mendefinisikan attribute shortcode
    $shortcode_args = shortcode_atts(
        array(
            'cat' => '',
            'num' => '5',
            'order' => 'desc'
        ), $attr);

    // membuat array dengan value attribute shortcode
    $args = array(
        'cat' => $shortcode_args['cat'],
        'posts_per_page' => $shortcode_args['num'],
        'order' => $shortcode_args['order'],
    );

    // get posts
    $recent_posts = get_posts($args);

    // perulangan untuk menampilkan posts
    foreach($recent_posts as $post) {
        setup_postdata($post);

        $output .= '<div class="row"><a class="col-4" href="'.get_permalink().'">'.get_the_post_thumbnail().'</a>';
        $output .= '<div class="col-8"><a class="title-c" href="'. get_permalink(). '">'. get_the_title().'</a>';
        $output .= '<p class="description-c">'. get_the_excerpt(). '</p></div></div>';
    }

    wp_reset_postdata();

    return $output;
} 

add_shortcode('diwp_recent_posts', 'recent_posts');

// membuat fungsi recent posts
function recent_posts_selected($attr, $content = null) {
    global $post;

    // Mendefinisikan attribute shortcode
    $shortcode_args = shortcode_atts(
        array(
            'cat' => '',
            'num' => '5',
            'order' => 'desc'
        ), $attr);

    // membuat array dengan value attribute shortcode
    $args = array(
        'cat' => $shortcode_args['cat'],
        'posts_per_page' => $shortcode_args['num'],
        'order' => $shortcode_args['order'],
    );

    // get posts
    $recent_posts = get_posts($args);

    // perulangan untuk menampilkan posts
    foreach($recent_posts as $post) {
        setup_postdata($post);

        $output .= '<div class="row"><a class="col-4-c" href="'.get_permalink().'">'.get_the_post_thumbnail().'</a>';
        $output .= '<div class="col-8-c"><a class="title-c-2" href="'. get_permalink(). '">'. get_the_title().'</a>';
        $output .= '<p class="description-c-2">'. get_the_excerpt(). '</p></div></div>';
    }

    wp_reset_postdata();

    return $output;
} 

add_shortcode('diwp_recent_posts_selected', 'recent_posts_selected');