<?php

    add_action( "wp_dashboard_setup", "create_widget");

    function create_widget() {
        wp_add_dashboard_widget( 'widget_template', "Rank Math Challenge", 'widget_template' );
    }

    function widget_template() {
        echo '<div class="wrap"><div id="wpdw"></div></div>';
    }