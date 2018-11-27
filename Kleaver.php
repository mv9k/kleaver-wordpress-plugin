<?php
/**
 * Plugin Name: Kleaver
 * Description: Generates natural content for posts and content marketing.
 * Version: 1.0
 * Author: Kristopher Wheeler
 */
    defined( 'ABSPATH' ) or die( 'fail' );

    function ideaOne()
    {
        # code...
        $information = "<h3>This is a very basic plugin.</h3>";
        $information .= "<p>tt<hr>ul</p>";
        return $information;
    }
    add_shortcode('example', 'ideaOne');

    function kleaver_admin_menu_option()
    {
        # code...
        add_menu_page(
            'Add Links & Scripts',
            'Kleaver',
            'manage_options',
            'kleaver-admin-menu',
            'kleaver_page',
            'dashicons-admin-appearance',
            200
        );
    }

    add_action('admin_menu','kleaver_admin_menu_option');

    function kleaver_page()
    {

        if(array_key_exists('submit_textareas_update',$_POST)) 
        {
            update_option('kleaver_first_textarea',$_POST['first_textarea']);
            update_option('kleaver_second_textarea',$_POST['second_textarea']);

            ?>
            <div id='setting-error-settings-updated' class='updated settings-error notice is-dismissible'><strong>Settings have been saved.</strong></div>
            <?php

        }
        $first_textarea = get_option('kleaver_first_textarea','none');
        $second_textarea = get_option('kleaver_second_textarea','none');

        ?>
        <div class='wrap'>
            <h2> Kleaver | Main </h2>
            <form method='post' action=''>
            <label for='first_textarea'>First Label</label>
            <textarea name='first_textarea' class='large-text'><?php print $first_textarea; ?></textarea>

            <label for='second_textarea'>Second Label</label>
            <textarea name='second_textarea' class='large-text'><?php print $second_textarea; ?></textarea>
            <hr>
            <input type='submit' name='submit_textareas_update' class='button button-primary' value='Update' />
            </form>
        </div>
        <?php
    }

    function kleaver_load_first_textarea()
    {
        $first_textarea = get_option('kleaver_first_textarea','none');
        echo '<style type="text/css">';
        echo $first_textarea;
        echo '</style>';
    }
    add_action('wp_head','kleaver_load_first_textarea');

    # do same for footer ...

?>