<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_ADD_SLASHES) ==> Filters:[Escape[\](", ', \)]
- Sanitization: htmlspecialchars_prm__<c>(ENT_QUOTES) ==> Filters:[Filtered(", &, ', <, >)]
- Filters complete: Filters:[Filtered(", &, ', <, >), Escape[\](", ', \)]
- Dataflow: assignment
- Context: xss_html_param_a
- Sink: exit

State:
- State: Bad
- Exploitable: Yes


# Exploit description

1. It is possible to create a javascript context with: javascript:alert(1)
-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_ADD_SLASHES);
$sanitized = htmlspecialchars($tainted, ENT_QUOTES);
$dataflow = $sanitized;
$context = (("<a href=\"" . $dataflow) . "\">link</a>");
exit($context);

?>