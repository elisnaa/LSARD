<!--
# Sample information

Patterns:
- Source: filter_input_array_prm__<c>(INPUT_GET)_<array>(<ae_k>(<s>(t),<c>(FILTER_SANITIZE_EMAIL))) ==> Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , ", (, ), ,, /, :, ;, <, >, \, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷)]
- Sanitization: html_entity_decode_prm_ ==> Filters:[]
- Filters complete: Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , ", (, ), ,, /, :, ;, <, >, \, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷)]
- Dataflow: assignment
- Context: xss_javascript_no_enclosure
- Sink: printf_func_prm__<s>(Print this: %s)

State:
- State: Bad
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input_array(INPUT_GET, ["t" => FILTER_SANITIZE_EMAIL]);
$tainted = $tainted["t"];
$sanitized = html_entity_decode($tainted);
$dataflow = $sanitized;
$pre = "<script>alert(Hello";
$post = ");</script>";
$context = ($pre . ($dataflow . $post));
printf("Print this: %s", $context);

?>