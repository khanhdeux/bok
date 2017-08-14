<?php
/*
 * The template for displaying Comments.
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
if ( post_password_required() )
	return;
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
?>

            <div class="section st-bg-grey-lighter">
               <section>
                  <div class="container container-800">
                     <div class="comments">

                     <?php if ( have_comments() ) : ?>
                     <h3 class="cm-block-title">
                     <?php comments_number( esc_html__( 'No Comments', 'rydon' ), esc_html__( 'One Comment', 'rydon' ), esc_html__( '% Comments', 'rydon' ) ); ?>
                     </h3>

                     <ul>
                     <?php wp_list_comments( 'type=comment&callback=rydon_comment' ); ?>
                     </ul>
                     </div>

                     <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                     <div class="row">
                         <div class="float-left"><?php previous_comments_link( esc_html_e( '&larr; Older Comments', 'rydon' ) ); ?></div>
                         <div class="float-right;"><?php next_comments_link( esc_html_e( 'Newer Comments &rarr;', 'rydon' ) ); ?></div>
                     </div>
                     <?php endif; ?>

                     <?php if ( ! comments_open() && get_comments_number() ) : ?>
                     <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'rydon' ); ?></p>
                     <?php endif; ?>

                     <?php endif; ?>
                      
                         
                     <?php $fields =  array(
                        'author' => '<div class="row"><div class="col-sm-4 form-group">' . '<label  class="sr-only" for="author">' . esc_html__( 'Name *', 'rydon' ) . '</label> ' . ( $req ? '' : '' ) .
                        '<input id="author" placeholder="Name *" name="author" type="text" class="form-control" value="' . esc_html__( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                        'email'  => '<div class="col-sm-4 form-group"><label  class="sr-only" for="email">' . esc_html__( 'Email *', 'rydon' ) . '</label> ' . ( $req ? '' : '' ) .
                        '<input id="email" placeholder="Email *" name="email" type="text" class="form-control" value="' . esc_html__(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
                        'url'    => '<div class="col-sm-4 form-group"><label  class="sr-only" for="url">' . esc_html__( 'Website', 'rydon' ) . '</label>' .
                        '<input id="url" placeholder="Website" name="url" type="text" class="form-control" value="' . esc_html__( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
                     ); ?>
                         
                     <?php $comments_args = array(
                        'label_submit' => esc_html__( 'Submit', 'rydon' ),
                        'class_submit' => 'btn btn-default btn-wide',
                        'title_reply'  => esc_html__( 'Leave a Comment', 'rydon' ),
                        'comment_notes_before' => '',
                        'comment_notes_after' => '',
                        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                        'comment_field' => '<div class="form-group"><label  class="sr-only" for="comment">' . esc_html__( 'Comment', 'rydon' ) . '</label><textarea class="form-control" rows="7" id="comment" placeholder="' . esc_html__( 'Comment', 'rydon' ) . '" name="comment" aria-required="true"></textarea></div>',
                     );

                     comment_form($comments_args); ?>
                      
                  </div>
               </section>
            </div>