<?php

function do_main_nav()
{
    ?>
    <div id="nav-wrapper" itemscope itemtype="http://schema.org/WebSite">
        <div id="nav" class="navbar navbar-expand-lg navigation navigation-top">
            <div class="navbar_wrapper">
                <a class="nav-logo" id="logo" href="<?php echo get_site_url() ?>"></a>

                <a class="button-get-started apply-now-mobile navbar_m_apply" href="./apply">Apply Now</a>
                <button class="navbar-toggle" onclick="toggleHamburger(this)" type="button" data-target="navbar_links_m" aria-expanded="false" aria-label="Toggle Nav">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </button>
                <div class="navbar_links_d" id="navbar_links_d">
                    <a class="button-get-started" href="./apply">Apply Now</a>
                    <a class="phone-nav" href="tel:8888059316"><i class="fa fa-phone"></i> (888) 805-9316</a>
                        <?php wp_nav_menu(array(
                                'menu'              => "Main Menu", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                                'container_id'      => "", // (string) The ID that is applied to the container.
                                'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
                                'before'            => "", // (string) Text before the link markup.
                                'after'             => "", // (string) Text after the link markup.
                                'link_before'       => '<div class="nav-link">', // (string) Text before the link text.
                                'link_after'        => "</div>", // (string) Text after the link text.
                                'echo'              => true, // (bool) Whether to echo the menu or return it. Default true.
                                'depth'             => "", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
                                'walker'            => "", // (object) Instance of a custom walker class.
                                'theme_location'    => "", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                'items_wrap'        => '<ul class="navbar-nav ml-auto">%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                                'item_spacing'      => "" // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
                            )); ?>
                </div>
            </div>
            <div class="navbar_links_m navbar_closed" id="navbar_links_m">

                <?php wp_nav_menu(array(
                        'menu'              => "Main Menu", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                        'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                        'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                        'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                        'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                        'container_id'      => "", // (string) The ID that is applied to the container.
                        'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
                        'before'            => "", // (string) Text before the link markup.
                        'after'             => "", // (string) Text after the link markup.
                        'link_before'       => '<div class="nav-link">', // (string) Text before the link text.
                        'link_after'        => "</div>", // (string) Text after the link text.
                        'echo'              => true, // (bool) Whether to echo the menu or return it. Default true.
                        'depth'             => "", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
                        'walker'            => "", // (object) Instance of a custom walker class.
                        'theme_location'    => "", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                        'items_wrap'        => '<ul class="navbar-nav ml-auto">%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                        'item_spacing'      => "" // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
                    )); ?>

                <a class="phone-nav" href="tel:8888059316"><i class="fa fa-phone"></i> (888) 805-9316</a>
            </div>
        </div>
    </div>
<?php
}

add_action('main_nav', 'do_main_nav');
?>