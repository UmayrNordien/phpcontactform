<?php
/**
 * Plugin Name: PHP Contact Form Plugin
 */
function example_form_plugin_styles() {
    wp_enqueue_style( 'example-form-plugin-style', plugin_dir_url( __FILE__ ) . 'css/form.css' );
}
add_action( 'wp_enqueue_scripts', 'example_form_plugin_styles' );

function example_form_plugin() {
    $content = '';

    $content .= '<div class="container">';
    $content .= '<h2>Contact Us</h2>'; 

    $content .= '<form method="post" action="https://formspree.io/f/meqwwren">'; //PHP Contact Form
    //name
    $content .= '<label>Name</label>';
    $content .= ' '; //space bewteen label and input
    $content .= '<input type="text" name="your_name" class="form-control" placeholder="Enter your name" />';
    $content .= '<br>'; //space

    //email
    $content .= '<label>Email</label>'; 
    $content .= ' '; //space bewteen label and input
    $content .= '<input type="text" name="your_email" class="form-control" placeholder="Enter your email" />';
    $content .= '<br>'; //space

    //message
    $content .= '<label for="your_comments">Message</label>'; 
    $content .= '<br>'; //space bewteen label and input
    $content .= '<textarea name="your_comments" class="form_control" placeholder="Message..."></textarea>';

    //submit button
    $content .= '<br /><input type="submit" name="example_form_control_submit" value="SEND" class="btn btn-outline-warning">';

    $content .= '</form>';
    $content .= '</div>';

    return $content;
};

add_shortcode('plugin_form', 'example_form_plugin');

function example_form_capture() {
    if (isset($_POST['example_form_submit']))
    {
        // echo "<pre>"; print_r($_POST); echo "</pre>";
        $name = sanitize_text_field($_POST['your_name']);
        $email = sanitize_text_field($_POST['your_email']);
        $comments = sanitize_textarea_field($_POST['your_comments']);

        $to = 'umayrnordien@gmail.com';
        $subject = 'Test form submission';
        $message = ''.$name. ' - ' .$email. ' - ' .$comments;

        wp_mail($to, $subject, $message);
    }
}
add_action('wp_head', 'example_form_capture');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    
</body>
</html>