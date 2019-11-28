<?php
// This is a sample PHP script that demonstrates accepting a POST from the        
// webhook, and then sending an email notification.      
$unescaped_post_data = $_POST;
$form_data = json_decode($unescaped_post_data['data_json']);

// Assemble the body of the email...                                              
$message_body = <<<EOM
form data: $form_data \n
EOM;

mail('shouhua.peng@moodys.com',
     'New site publish',
     $message_body);
?>
