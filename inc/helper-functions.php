<?php
function get_contact_info($type) {
    $args = array(
        'post_type' => 'information',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    
    $items = get_posts($args);
    foreach ($items as $item) {
        $title = strtolower($item->post_title);
        
        if ($type === 'phone' && strpos($title, 'phone') !== false) {
            $link = get_post_meta($item->ID, 'link', true);
            return array(
                'url' => 'tel:' . preg_replace('/[^0-9+]/', '', $link),
                'display' => $link
            );
        }
        
        if ($type === 'email' && strpos($title, 'gmail') !== false) {
            $link = get_post_meta($item->ID, 'link', true);
            return array(
                'url' => 'mailto:' . $link,
                'display' => $link
            );
        }
    }
    
    // مقادیر پیش‌فرض
    return $type === 'phone' 
        ? array('url' => 'tel:+989369079925', 'display' => '(+98) 936 907 9925')
        : array('url' => 'mailto:nahali.dev@gmail.com', 'display' => 'nahali.dev@gmail.com');
}