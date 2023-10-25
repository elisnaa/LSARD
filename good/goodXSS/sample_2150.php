<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_ADD_SLASHES) ==> Filters:[Escape[\](", ', \)]
- Sanitization: htmlspecialchars_1 ==> Filters:[Filtered(", &, <, >)]
- Filters complete: Filters:[Filtered(", &, <, >), Escape[\](", ', \)]
- Dataflow: assignment
- Context: xss_html_param
- Sink: exit

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_ADD_SLASHES);
$sanitized = htmlspecialchars($tainted);
$dataflow = $sanitized;
$context = (("<img src=\"" . $dataflow) . "\"/>");
exit($context);

?>