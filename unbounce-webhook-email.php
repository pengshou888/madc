<?php
// This is a sample PHP script that demonstrates accepting a POST from the        
// Unbounce form submission webhook, and then sending an email notification.      
function stripslashes_deep($value) {
  $value = is_array($value) ?
    array_map('stripslashes_deep', $value) :
    stripslashes($value);
  return $value;
}
// First, grab the form data.  Some things to note:                               
// 1.  PHP replaces the '.' in 'data.json' with an underscore.                    
// 2.  Your fields names will appear in the JSON data in all lower-case,          
//     with underscores for spaces.                                               
// 3.  We need to handle the case where PHP's 'magic_quotes_gpc' option           
//     is enabled and automatically escapes quotation marks.                      
if (get_magic_quotes_gpc()) {
  $unescaped_post_data = stripslashes_deep($_POST);
} else {
  $unescaped_post_data = $_POST;
}
$form_data = json_decode($unescaped_post_data['data_json']);

// Assemble the body of the email...                                              
$message_body = <<<EOM
form data: $form_data \n
EOM;
mail('shouhua.peng@moodys.com',
     'New Unbounce Form Submission!',
     $message_body);
?>
