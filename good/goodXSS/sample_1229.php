<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_FULL_SPECIAL_CHARS) ==> Filters:[Filtered(", &, ', <, >)]
- Sanitization: cast_prm__TYPE_STRING ==> Filters:[]
- Filters complete: Filters:[Filtered(", &, ', <, >)]
- Dataflow: assignment
- Context: xss_apostrophe
- Sink: exit

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sanitized = (string)($tainted);
$dataflow = $sanitized;
$context = (("Hello to '" . $dataflow) . "'");
exit($context);

?>