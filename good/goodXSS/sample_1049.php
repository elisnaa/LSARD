<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_NUMBER_INT) ==> Filters:[letters, specials]
- Sanitization: preg_replace_prm__<s>(_'_)_<s>() ==> Filters:[Filtered(')]
- Filters complete: Filters:[letters, specials, Filtered(')]
- Dataflow: assignment
- Context: xss_quotes
- Sink: vprintf_prm__<s>(This%s)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_NUMBER_INT);
$sanitized = preg_replace("/'/", "", $tainted);
$dataflow = $sanitized;
$context = (("Hello to \"" . $dataflow) . "\"");
vprintf("This%s", $context);

?>