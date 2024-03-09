<?php

/**
 * Adds Foo_Widget widget.
 */
class social_links_widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'social_links_widget', // Base ID
            esc_html__('Social Profile Links', 'sl_domain'), // Name
            array('description' => esc_html__('Outputs social icons linked to profiles', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $links = array(
            'facebook' => esc_attr($instance['facebook_link']),
            'twitter' => esc_attr($instance['twitter_link']),
            'linkedin' => esc_attr($instance['linkedin_link']),
            'instagram' => esc_attr($instance['instagram_link']),

        );

        $icons = array(
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'linkedin' => esc_attr($instance['linkedin_icon']),
            'instagram' => esc_attr($instance['instagram_icon']),

        );

        $icon_width = $instance['icon_width'];


        echo $args['before_widget'];
        echo "<h3 style='margin-bottom:10px;'>Social Profiles<h3>";

        // Call Fronted Function just to display these values
        $this->getSocialLinks($links, $icons, $icon_width);

        echo $args['after_widget'];
        echo "<hr>";
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        // Call form Function 
        $this->getForm($instance);
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array(
            'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '',
            'twitter_link' => (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '',
            'linkedin_link' => (!empty($new_instance['linkedin_link'])) ? strip_tags($new_instance['linkedin_link']) : '',
            'instagram_link' => (!empty($new_instance['instagram_link'])) ? strip_tags($new_instance['instagram_link']) : '',
            'facebook_icon' => (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '',
            'twitter_icon' => (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '',
            'linkedin_icon' => (!empty($new_instance['linkedin_icon'])) ? strip_tags($new_instance['linkedin_icon']) : '',
            'instagram_icon' => (!empty($new_instance['instagram_icon'])) ? strip_tags($new_instance['instagram_icon']) : '',

            'icon_width' => (!empty($new_instance['icon_width'])) ? strip_tags($new_instance['icon_width']) : '',

        );

        return $instance;
    }
    /**
     * Gets and Displays form
     * 
     * @param array $instance The widget options
     */
    public function getForm($instance)
    {
        // Get Facebook Link
        if (isset($instance['facebook_link'])) {
            $facebook_link = esc_attr($instance['facebook_link']);
        } else {
            $facebook_link = 'https://www.facebook.com';
        }

        // Get Twitter Link
        if (isset($instance['twitter_link'])) {
            $twitter_link = esc_attr($instance['twitter_link']);
        } else {
            $twitter_link = 'https://www.twitter.com';
        }

        // Get Linkedin Link
        if (isset($instance['linkedin_link'])) {
            $linkedin_link = esc_attr($instance['linkedin_link']);
        } else {
            $linkedin_link = 'https://www.linkedin.com';
        }

        // Get Instagram Link
        if (isset($instance['instagram_link'])) {
            $instagram_link = esc_attr($instance['instagram_link']);
        } else {
            $instagram_link = 'https://www.instagram.com';
        }

        // Get Facebook Icon
        if (isset($instance['facebook_icon'])) {
            $facebook_icon = esc_attr($instance['facebook_icon']);
        } else {
            $facebook_icon = plugins_url('/social-profile-links/img/facebook.jpg');
        }

        // Get Twitter Icon
        if (isset($instance['twitter_icon'])) {
            $twitter_icon = esc_attr($instance['twitter_icon']);
        } else {
            $twitter_icon = plugins_url('/social-profile-links/img/twitter.jpg');
        }

        // Get Linkedin Icon
        if (isset($instance['linkedin_icon'])) {
            $linkedin_icon = esc_attr($instance['linkedin_icon']);
        } else {
            $linkedin_icon = plugins_url('/social-profile-links/img/linkedin.jpg');
        }

        // Get instagram Icon
        if (isset($instance['instagram_icon'])) {
            $instagram_icon = esc_attr($instance['instagram_icon']);
        } else {
            $instagram_icon = plugins_url('/social-profile-links/img/instagram.jpg');
        }

        // Get Icon Size 
        if (isset($instance['icon_width'])) {
            $icon_width = esc_attr($instance['icon_width']);
        } else {
            $icon_width = 32;
        }
?>
        <h4>Facebook</h4>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Profile Link', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_link');  ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" type="text" value="<?php echo esc_attr($facebook_link);  ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php _e('Icon', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_icon');  ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" type="text" value="<?php echo esc_attr($facebook_icon);  ?>">
        </p>

        <h4>Twitter</h4>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Profile Link', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_link');  ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" type="text" value="<?php echo esc_attr($twitter_link);  ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php _e('Icon', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_icon');  ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" type="text" value="<?php echo esc_attr($twitter_icon);  ?>">
        </p>

        <h4>Linkedin</h4>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('Profile Link', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_link');  ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" type="text" value="<?php echo esc_attr($linkedin_link);  ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"><?php _e('Icon', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_icon');  ?>" name="<?php echo $this->get_field_name('linkedin_icon'); ?>" type="text" value="<?php echo esc_attr($linkedin_icon);  ?>">
        </p>

        <h4>Instagram</h4>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Profile Link', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_link');  ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" type="text" value="<?php echo esc_attr($instagram_link);  ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram_icon'); ?>"><?php _e('Icon', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_icon');  ?>" name="<?php echo $this->get_field_name('instagram_icon'); ?>" type="text" value="<?php echo esc_attr($instagram_icon);  ?>">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php _e('Icon Width', 'default') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_width');  ?>" name="<?php echo $this->get_field_name('icon_width'); ?>" type="text" value="<?php echo esc_attr($icon_width);  ?>">

        </p>



    <?php
    }

    /** 
     * Gets and displays Social Icons
     * @param array $links includes Social Links
     * @param array $icons includes social Icons
     * @param array $icon_width includes width of icons
     */

    public function getSocialLinks($links, $icons, $icon_width)
    {
    ?>
        <div class="social-links">
            <a href="<?php echo esc_attr($links['facebook']) ?>"><img src="<?php echo esc_attr($icons['facebook']);  ?>" width="<?php echo $icon_width; ?>" alt="" /></a>
            <a href="<?php echo esc_attr($links['twitter']) ?>"><img src="<?php echo esc_attr($icons['twitter']);  ?>" width="<?php echo $icon_width; ?>" alt="" /></a>
            <a href="<?php echo esc_attr($links['linkedin']) ?>"><img src="<?php echo esc_attr($icons['linkedin']);  ?>" width="<?php echo $icon_width; ?>" alt="" /></a>
            <a href="<?php echo esc_attr($links['instagram']) ?>"><img src="<?php echo esc_attr($icons['instagram']);  ?>" width="<?php echo $icon_width; ?>" alt="" /></a>

        </div>
<?php

    }
}
