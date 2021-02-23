<?php 
namespace SoumissionContact;

use SoumissionContact\Shortcode\SoumissionShortcode;
use SoumissionContact\Posttypes\SoumissionContact;

class Init
{
    public function __construct(){
        add_action('init', [$this, "create_posttypes"]);
        new SoumissionShortcode();
    }

    public function create_posttypes(){
        new SoumissionContact();
    }

}

