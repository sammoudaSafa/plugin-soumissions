<?php

namespace init;
use WP_Query;

class CostumPostSoumission{
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
}