<?php
/**
 * Pulgin de soumission Écoles entreprises
 *
 * @author      Sammouda Safa
 * 
 *
 * @wordpress-plugin
 * Plugin Name: Soumission
 * Version: 1.0
 * Description: plugins des soumissions présentées aux Entreprises Écoles
 * Author: Sammouda Safa
 * Author URI: http://
 * Plugin URI: https://github.com/2ndkauboy/hello-world
 */

// Hook the 'wp_footer' action hook, add the function named 'mfp_Add_Text' to it
add_action("wp_footer", "mfp_Add_Text");
 
// Define 'mfp_Add_Text'
function mfp_Add_Text()
{
  echo "<p style='color: black;'>After the footer is loaded, my text is added!</p>";
}
