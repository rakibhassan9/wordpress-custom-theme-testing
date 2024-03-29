

<?php get_header(); ?>

<body <?php body_class(); ?>>
<?php get_template_part("hero"); ?>
    <div class="posts">

            <?php 
                while(have_posts()) :
                    the_post();
            ?>
                <div class="post"<?php post_class(); ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h2 class="post-title text-center">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="text-center">
                                    <strong><?php the_author(); ?></strong><br/>
                                    <?php echo get_the_date(); ?>
                                </p>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <p class="text-center">
                                    <?php 
                                        if(has_post_thumbnail()){
                                            echo '<a class="popup" href="#" data-featherlight="image">';
                                                the_post_thumbnail("large", array("class"=>"img-fluid"));
                                            echo '</a>';
                                        }
                                    ?>
                                </p>
                                
                                <?php 
                                    
                                    the_content();
                                    
                                    next_post_link('%link', 'Next Post');
                                    echo "</br>";
                                    previous_post_link('%link', 'Prev Post');

                                ?>
                            </div>
                            
                        </div>

                    </div>
                </div>
            <?php
                endwhile;
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"> </div>
                    <div class="col-md-8">
                        <?php the_posts_pagination(array(
                            "screen_reader_text"=> " ",
                            "prev_text"=>"New Posts",
                            "next_text"=>"Old Posts"
                        )); ?>
                    </div>

                </div>
            </div>


        </div>
    </div>
        

<?php get_footer(); ?>

