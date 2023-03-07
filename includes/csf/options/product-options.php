<?php if (!defined('ABSPATH')) {
  die;
}

$prefix_product_opts = '_prefix_product_options';

CSF::createMetabox($prefix_product_opts, array(
  'title'              => 'تنظیمات اختصاصی زانا',
  'post_type'          => 'product',
  'data_type'          => 'serialize',
  'context'            => 'advanced',
  'priority'           => 'default',
  'exclude_post_types' => array(),
  'page_templates'     => '',
  'post_formats'       => '',
  'show_restore'       => false,
  'enqueue_webfont'    => true,
  'async_webfont'      => false,
  'output_css'         => true,
  'nav'                => 'normal',
  'theme'              => 'dark',
  'class'              => '',
));


CSF::createSection($prefix_product_opts, array(
  'title'  => 'فایل های دوره',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
    array(
      'id'     => 'opt-product-files-repeater',
      'type'   => 'repeater',
      'title'  => 'لیست فابل های دوره',
      'fields' => array(
        array(
          'id'    => 'opt-product-file-upload',
          'type'  => 'upload',
          'title' => 'Upload',
        ),
        array(
          'id'    => 'opt-product-file-title',
          'type'  => 'text',
          'title' => 'Text',
        ),
        // array(
        //   'id'     => 'opt-product-files-fieldset',
        //   'type'   => 'fieldset',
        //   'title'  => 'فایل',
        //   'fields' => array(

        //   ),
        // ),
      ),
    ),
  )
));
