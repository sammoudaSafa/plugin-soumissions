<?php
namespace WerkContact\Shortcode;

class WerkShortcode
{
    public function __construct(){
        add_shortcode( 'werk_contact_registration', [$this, 'registration_shortcode'] );
    }

    public function contact_form(){
    echo '<div class="form"><form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">';
        wp_nonce_field( 'entreprise', 'register-entreprise' );
    echo '<input value="' . ( isset( $_POST['prenom']) ? $_POST['prenom'] : null ) . '" id="prenom" type="text" name="prenom" placeholder="Votre prénom">
        <input value="' . ( isset( $_POST['nom']) ? $_POST['nom'] : null ) . '" id="nom" type="text" name="nom" placeholder="Votre nom">
        <input value="' . ( isset( $_POST['courriel']) ? $_POST['courriel'] : null ) . '" type="email" name="courriel" id="courriel" placeholder="Votre courriel">
        <input value="' . ( isset( $_POST['entreprise']) ? $_POST['entreprise'] : null ) . '" type="text" name="entreprise" id="entreprise" placeholder="Nom de votre entreprise">
        <textarea name="description" id="description" placeholder="Courte description de votre entreprise."></textarea>
        <input id="submit" type="submit" name="envoyer" id="submit" value="Inscrire votre entreprise" />
        </form></div>';
    }

    public function registration_shortcode(){
        ob_start();
        echo $this->contact_form();
        return ob_get_clean();
    }

}