<?php

function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
	add_theme_support("custom-background");
	$alpha_custom_header_details = array(
		"header-text" 	=> true,
		"width"			=> 1200,
		"height"		=> 600,
		"flex-width"	=> true,
		"flex-height"	=> true 
	);
	add_theme_support("custom-header",$alpha_custom_header_details);
	$alpha_custom_logo_details = array(
		"width"  => '250px',
		"height" => '100px',
		"flex-width" => true,
		"flex-height" => true
	);
	add_theme_support("custom-logo", $alpha_custom_logo_details);
	register_nav_menu("topmenu", __("Top Menu", "alpha"));
	register_nav_menu("footermwnu", __("Footer Menu", "alpha"));
}


add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets(){
    wp_enqueue_style("alpha", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	wp_enqueue_style("featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
	wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"),"0.0.1", true);
	wp_enqueue_script("alpha-main", get_theme_file_uri("/assets/js/main.js"), array("jquery", "featherlight-js"),"0.0.1", true);
}

add_action( "wp_enqueue_scripts", "alpha_assets");



/**
 * Add a sidebar.
 */
function alpha_sidebar() {
	register_sidebar( 
		array(
		'name'          => __( 'Right Sidebar', 'alpha' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Right Sidebar On Post', 'alpha' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) 
);
register_sidebar( 
	array(
	'name'          => __( 'footer left widget area', 'alpha' ),
	'id'            => 'footer-left',
	'description'   => __( 'Footer Left widget', 'alpha' ),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) 
);
register_sidebar( 
	array(
	'name'          => __( 'footer right widget area', 'alpha' ),
	'id'            => 'footer-right',
	'description'   => __( 'Footer Right widget', 'alpha' ),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) 
);
}
add_action( "widgets_init", "alpha_sidebar" );


function alpha_the_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	}else{
		echo get_the_password_form();
	}
}
add_filter("the_excerpt", "alpha_the_excerpt");



function alpha_protected_title_format(){
	return "%s";
}

add_filter("protected_title_format", "alpha_protected_title_format");

function alpha_menu_css_class($classes, $item){
	$classes[] = "list-inline-item";
	return $classes;
}
add_filter("nav_menu_css_class", "alpha_menu_css_class", 10, 2);

function alpha_about_page_template_banner() {
    if ( is_page() ) {
        $alpha_feat_image = get_the_post_thumbnail_url( null, "large" );
        ?>
        <style>
            .page-header {
                background-image: url(<?php echo $alpha_feat_image;?>);
            }
        </style>
        <?php
    }

    if ( is_front_page() ) {
        if ( current_theme_supports( "custom-header" ) ) {
            ?>
            <style>
                .header{
                    background-image: url(<?php echo header_image();?>);
                    background-size: cover;
                    margin-bottom: 50px;
                }
				.header h1.heading a, h3.tagline{
					color: #<?php  echo get_header_textcolor() ?>;
				}
            </style>
            <?php
        }
    }
}

add_action( "wp_head", "alpha_about_page_template_banner", 11);


















?>