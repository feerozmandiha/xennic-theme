<?php
/**
 * فایل اصلی functions.php برای قالب اختصاصی بلوکی شرکتی / فروشگاهی
 * ساختار شی‌گرا (OOP) جهت توسعه‌پذیری و نگهداری آسان
 */

if ( ! class_exists( 'XennicTheme' ) ) {

	class XennicTheme {

		public function __construct() {
			// راه‌اندازی قابلیت‌های قالب
			add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

			// بارگذاری فونت‌ها و استایل‌ها
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		}

		/**
		 * فعال‌سازی قابلیت‌های قالب
		 */
		public function setup_theme() {

			// پشتیبانی از قالب‌های بلوکی
			add_theme_support( 'block-templates' );

			// پشتیبانی از استایل اختصاصی برای ویرایشگر بلوک
			add_theme_support( 'editor-styles' );

			// بارگذاری فایل استایل مخصوص ویرایشگر
			add_editor_style( 'assets/css/editor.css' );

			// پشتیبانی از فروشگاه‌ساز ووکامرس
			add_theme_support( 'woocommerce' );

			// بارگذاری ترجمه‌ها (در صورت نیاز)
			load_theme_textdomain( 'xennic', get_template_directory() . '/languages' );
		}

		/**
		 * بارگذاری فونت‌های سفارشی و فایل‌های CSS اضافی
		 */
		public function enqueue_assets() {

			// بارگذاری فونت سفارشی IRANSansXFaNum
			wp_enqueue_style(
				'xennic-fonts',
				get_template_directory_uri() . '/assets/fonts/fonts.css',
				[],
				null
			);

			// استایل اصلی قالب
			wp_enqueue_style(
				'xennic-style',
				get_stylesheet_uri(), // style.css
				[],
				wp_get_theme()->get( 'Version' )
			);

			// بارگذاری CSS سفارشی برای کنترل هاور و اصلاحات ظاهری
			wp_enqueue_style(
				'xennic-custom-style',
				get_template_directory_uri() . '/assets/css/custom.css',
				[],
				null
			);
		}
	}

	// اجرای کلاس قالب
	new XennicTheme();
}
