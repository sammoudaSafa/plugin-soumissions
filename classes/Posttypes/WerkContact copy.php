<?php 
namespace WerkContact\Posttypes;
use WP_Query;

class WerkContact{
    public function __construct()
    {
        $this->create_post_type();   
        $this->create_contact_taxonomy();
    }
    public function create_post_type(){
        $labels = [
            'name' =>           __("Contacts", "kraft"),
            'singular_name' =>  __("Werk Contact", "kraft"),
            'menu_name' =>      _x("Werk Contact", "kraft"),
            'add_new'            => __("Ajouter un nouveau contact","kraft"),
            'add_new_item'       => __("Ajouter un nouveau contact","kraft"),
            'edit'               => __("Editer","kraft"),
            'edit_item'          => __("Editer","kraft"),
            'new_item'           => __("Nouveau","kraft"),
            'view'               => __("Voir","kraft"),
            'view_item'          => __("Voir","kraft"),
            'search_items'       => __("Recherche dans les contacts","kraft"),
            'not_found'          => __("Non trouve","kraft"),
            'not_found_in_trash' => __("Aucun element trouve dans la poubelle","kraft"),
            'parent'             => __("Contact parent","kraft")
        ];

        $args =[
            'labels' => $labels,
            'public' => true,
            'has_archive'   => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_in_menu' => true,
            'hierarchical'  => false,
            'rewrite'   => ["slug" => "contact"],
            'capability' => 'post'
        ];
        register_post_type('werkcontact_contact', $args);
    }

    public function create_contact_taxonomy(){
        $args = [
            'hierarchical'      => true,
            'label'             => 'Type de contact',
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'type/contact']
        ];
        register_taxonomy('contact_type', ['werkcontact_contact','post'], $args);
    }


    static public function get_all_contact(){
        $args = [
            'post_type' => 'werkcontact_contact',
            'order'=>'ASC',
            'post_per_page' => -1
        ];

        return new WP_Query($args);
    }

    static public function get_all_contact_by_taxonomy($type = 'allo'){
        $args = [
            'post_type' => 'werkcontact_contact',
            'post_per_page' => -1, 
            'tax_query' => [
                [
                    'taxonomy' => 'contact_type',
                    'field' => 'slug',
                    'terms' => $type
                ]
            ]
        ];
        return new WP_Query($args);
    }

    static public function get_contact_by_meta($key = "courriel",$default = 'hot@courriel.com'){
        $args = [
            'post_type' => 'werkcontact_contact',
            'post_per_page' => -1, 
            'meta_query' => [
                [
                    'key' => $key,
                    'value' => $default,
                    'compare' => 'IN',
                ]
            ]
        ];
        return new WP_Query($args);
    }
}
