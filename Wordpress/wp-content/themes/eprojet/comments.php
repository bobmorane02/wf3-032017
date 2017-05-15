<div id="comments">
    <!-- have_commants() est une fonction interne wordpress qui renvoi un booléan true tant qu'il y a des
         commentaires dans la BDD get_comment_number() est une fonction interne  qui permet de récupérer 
         les commentaires en BDD -->
         <?php if(have_comments()) : echo get_comments_number(); endif; ?> commentaire(s).<br>
         <?php if (get_comment_pages_count > 1 && get_option('page_comments')): ?>
         <nav>
            <?php _e('Comment navigation','eprojet');?>
            <?php previous_comments_link(__('&larr; Older comments','eprojet')); ?>
            <?php next_comments_link(__('Newer comments &rarr;','eprojet')); ?>
         </nav>
         <?php endif; ?>

         <?php wp_list_comments(); ?>

         <?php if(comments_open()): ?>
            <?php comments_form(array('comment_notes_after'=>'')); ?>
         <?php elseif (have_comments()) : ?>
            <?php _e('comments are closed','eprojet'); ?>
         <?php endif; ?>
</div>