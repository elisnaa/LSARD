<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_UNSAFE_RAW) ==> Filters:[]
- Sanitization: intval ==> Filters:[letters, specials]
- Filters complete: Filters:[letters, specials]
- Dataflow: assignment
- Context: xss_html_param_a
- Sink: vprintf_prm__<s>(This%s)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_UNSAFE_RAW);
$sanitized = intval($tainted);
$dataflow = $sanitized;
$context = (("<a href=\"" . $dataflow) . "\">link</a>");
vprintf("This%s", $context);

?>