<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_EMAIL) ==> Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , ", (, ), ,, /, :, ;, <, >, \, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷)]
- Sanitization: filter_var_prm__<c>(FILTER_SANITIZE_ADD_SLASHES) ==> Filters:[Escape[\](", ', \)]
- Filters complete: Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , ", (, ), ,, /, :, ;, <, >, \, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷), Escape[\](", ', \)]
- Dataflow: assignment
- Context: xss_apostrophe
- Sink: user_error_prm_

State:
- State: Good
- Exploitable: Not found


# Exploit description

1. Escape the apostrophe with '
-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_EMAIL);
$sanitized = filter_var($tainted, FILTER_SANITIZE_ADD_SLASHES);
$dataflow = $sanitized;
$context = (("Hello to '" . $dataflow) . "'");
user_error($context);

?>