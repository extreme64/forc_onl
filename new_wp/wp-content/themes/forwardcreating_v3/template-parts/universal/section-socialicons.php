<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
?>

<?php
function socialicons_element($element_type=1, $classes="") {
  switch ($element_type) {
    case 1: ?>
    <?php
    break;
    case 3: ?>
        <div class="social-icons <?php print $classes ?>">
            <a href="https://t.me/forwardcreating"><i class="fab fa-telegram" aria-hidden="true"></i></a>
            <a href=""><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/channel/UC84NBp-A_shu1c0snwLyV6w/"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
            <a href="https://www.patreon.com/forwardcreating?fan_landing=true&r=forwardcreating"><i class="fab fa-patreon" aria-hidden="true"></i></a>
            <a href=""><i class="fab fa-reddit-square" aria-hidden="true"></i></a>
            <a href=""><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
        </div>
    <?php
    break;

    default:
    // print "No view to display!";
    break; 
  }
}

?>
