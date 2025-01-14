<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $video_block_layout = get_field('video_block_layout');
    $video_pre_headline = get_field('video_pre_headline');
    $video_headline_top = get_field('video_headline_top');
    $video_copy_block_top = get_field('video_copy_block_top');
    $video_headline_left = get_field('video_headline_left');
    $video_copy_block_left = get_field('video_copy_block_left');
    $video_cta_text = get_field('video_cta_text');
    $video_button_text = get_field('video_button_text');
    $video_button_link = get_field('video_button_link');
    $video_source = get_field('video_source');
    $video_embed_code = get_field('video_embed_code');
    $video_length = get_field('video_length');
    $video_highlights = get_field('video_highlights');
    $video_transcript_intro = get_field('video_transcript_intro');
    $video_transcript_remainder = get_field('video_transcript_intro');

?>

<?php if($video_block_layout == 'slim') { ?>

<section class="video-block" id="video-slim">
    <div class="container">
        <div class="columns">
            <div class="column-full centered block">
                <p class="pre-headline"><?php echo $video_pre_headline; ?></p>
                <h2><?php echo $video_headline_top; ?></h2>
                <div class="spacer-15"></div>
                <?php echo $video_copy_block_top; ?>
            </div>
            <div class="spacer-30"></div>
            <div class="column-75 center block">
                <div class="video-embed">
                    <iframe class="responsive-video" src="<?php echo ( get_field('video_source') === "vimeo" ? "https://player.vimeo.com/video/": "https://www.youtube.com/embed/" ); ?><?php the_field('video_embed_code'); ?><?php echo ( get_field('video_embed_type') === "vimeo" ? "?&title=0&byline=0&portrait=0" : "" ); ?>" width="640" height="360px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if($video_block_layout == 'full') { ?>

<section class="video-block" id="video-full">
    <div class="container">
        <div class="columns">
            <div class="column-full centered block">
                <p class="pre-headline"><?php echo $video_pre_headline; ?></p>
                <h2><?php echo $video_headline_top; ?></h2>
                <div class="spacer-15"></div>
                <?php echo $video_copy_block_top; ?>
            </div>
            <div class="spacer-30"></div>
            <div class="column-50 block">
                <h3><?php echo $video_headline_left; ?></h3>
                <div class="spacer-15"></div>
                <?php echo $video_copy_block_left; ?>
                <p class="cta-text"><strong><?php echo $video_cta_text; ?></strong></p>
                <a href="<?php echo $video_button_link; ?>" class="btn"><?php echo $video_button_text; ?></a>
            </div>
            <div class="column-50 block">
                <div class="video-container">
                    <div class="video-embed">
                        <iframe class="responsive-video" src="<?php echo ( get_field('video_source') === "vimeo" ? "https://player.vimeo.com/video/": "https://www.youtube.com/embed/" ); ?><?php the_field('video_embed_code'); ?><?php echo ( get_field('video_embed_type') === "vimeo" ? "?&title=0&byline=0&portrait=0" : "" ); ?>" width="640" height="360px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="spacer-30"></div>
                    <div class="video-highlights">
                        <p class="lrg">Video Highlights</p>
                        <?php if( have_rows('video_highlights') ): ?>
                        <ul>
                        <?php while( have_rows('video_highlights') ): the_row(); ?>  
                            <li><?php the_sub_field('highlight'); ?></li>
                        <?php endwhile; ?>
                        </ul>
                        <?php endif; ?> 
                        <div class="runtime">
                            <p class="lrg"><?php echo $video_length; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if($video_block_layout == 'full-t') { ?>

    <section class="video-block" id="video-full-t">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <div class="video-embed">
                    <iframe class="responsive-video" src="<?php echo ( get_field('video_source') === "vimeo" ? "https://player.vimeo.com/video/": "https://www.youtube.com/embed/" ); ?><?php the_field('video_embed_code'); ?><?php echo ( get_field('video_embed_type') === "vimeo" ? "?&title=0&byline=0&portrait=0" : "" ); ?>" width="640" height="360px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="column-33 block">
                <div class="highlight-container">
                    <p class="lrg">Video Highlights</p>
                    <?php if( have_rows('video_highlights') ): ?>
                    <ul>
                    <?php while( have_rows('video_highlights') ): the_row(); ?>  
                        <li><?php the_sub_field('highlight'); ?></li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?> 
                </div>
            </div>
            <div class="spacer-30"></div>
            <div class="column-full block">
                <p class="large spaced caps bottom-0"><strong>Video Transcript</strong></p>
                <div class="content-box">
                    <p><?php the_field('video_transcript_intro'); ?><span class="ellipsis visible"> ...</span>
                    <span class="extra closed"><?php the_field('video_transcript_remainder'); ?></p>
                    <div class="transcript-more"><div class="plus"><span>+</span></div> <p class="small spaced caps">Read Full Video Transcript</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(".transcript-more").on("click", function() {
        // will (slide) toggle the related panel.
        jQuery(this).parent().find('.extra').toggleClass("closed");
        jQuery(this).parent().find('.extra').toggleClass("fadein");
        jQuery(this).parent().find('.ellipsis').toggleClass("visible");
        jQuery(this).toggleClass("clicked");
    });
</script>

<?php } ?>