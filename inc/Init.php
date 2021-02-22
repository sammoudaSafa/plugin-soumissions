<?php 
namespace SoumissionContact;

// use WerkContact\Shortcode\WerkShortcode;
use SoumissionContact\Posttypes\SoumissionContact;

class Init
{
    // public function __construct(){
    //     add_action('init', [$this, "create_posttypes"]);
    //     new WerkShortcode();
    // }

    public function create_posttypes(){
        new SoumissionContact();
    }

}

