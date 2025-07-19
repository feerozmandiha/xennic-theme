<?php
/**
 * فایل راه‌انداز قالب - ساختار شی‌گرا
 */

if ( ! class_exists( 'XennicTheme' ) ) {
    class XennicTheme {
        
        public function __construct() {
            add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        }

        /**
         * فعال‌سازی قابلیت‌های قالب
         */
        public function setup_theme() {
            add_theme_support( 'block-templates' );
            add_theme_support( 'editor-styles' );
            add_theme_support( 'woocommerce' );
        }

        /**
         * بارگذاری فونت سفارشی و سایر استایل‌ها
         */
        public function enqueue_assets() {
            // بارگذاری فونت محلی
            wp_enqueue_style(
                'xennic-fonts',
                get_template_directory_uri() . '/assets/fonts/fonts.css',
                [],
                null
            );
        }
    }

    // اجرای کلاس
    new XennicTheme();
}
