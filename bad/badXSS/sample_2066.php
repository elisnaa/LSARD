<!--
# Sample information

Patterns:
- Source: _COOKIE ==> Filters:[]
- Sanitization: urlencode ==> Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , !, ", #, $, %, &, ', (, ), *, ,, /, :, ;, <, =, >, ?, @, [, \, ], ^, `, {, |, }, ~, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷)]
- Filters complete: Filters:[Filtered( , , , , , , , , , 	, 
, , , , , , , , , , , , , , , , , , , , , ,  , !, ", #, $, %, &, ', (, ), *, ,, /, :, ;, <, =, >, ?, @, [, \, ], ^, `, {, |, }, ~, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,  , ¡, ¢, £, ¤, ¥, ¦, §, ¨, ©, «, ¬, ­, ®, ¯, °, ±, ², ³, ´, ¶, ·, ¸, ¹, », ¼, ½, ¾, ¿, ×, ÷)]
- Dataflow: assignment
- Context: xss_javascript_no_enclosure
- Sink: vprintf_prm__<s>(This%s)

State:
- State: Bad
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = $_COOKIE;
$tainted = $tainted["t"];
$sanitized = urlencode($tainted);
$dataflow = $sanitized;
$pre = "<script>alert(Hello";
$post = ");</script>";
$context = ($pre . ($dataflow . $post));
vprintf("This%s", $context);

?>