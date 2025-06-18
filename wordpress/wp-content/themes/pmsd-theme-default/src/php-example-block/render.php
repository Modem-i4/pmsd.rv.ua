<?php
$posts = get_posts([
    'numberposts' => $attributes['numberOfPosts'] ?? 3,
]);
?>

<div class="my-dynamic-block">
    <?php foreach ( $posts as $post ): ?>
        <article>
            <h3><?php echo esc_html( $post->post_title ); ?></h3>
            <p><?php echo esc_html( wp_trim_words( $post->post_content, 20 ) ); ?></p>
        </article>
    <?php endforeach; ?>
</div>



