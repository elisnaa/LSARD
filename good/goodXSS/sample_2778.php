<!--
# Sample information

Patterns:
- Source: filter_input_array_prm__<c>(INPUT_GET)_<array>(<ae_k>(<s>(t),<c>(FILTER_SANITIZE_SPECIAL_CHARS))) ==> Filters:[Filtered(", &, ', <, >)]
- Sanitization: count_chars_prm_ ==> Filters:[letters, specials]
- Filters complete: Filters:[letters, specials, Filtered(", &, ', <, >)]
- Dataflow: assignment
- Context: xss_apostrophe
- Sink: print_func

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = filter_input_array(INPUT_GET, ["t" => FILTER_SANITIZE_SPECIAL_CHARS]);
$tainted = $tainted["t"];
$sanitized = count_chars($tainted);
$dataflow = $sanitized;
$context = (("Hello to '" . $dataflow) . "'");
print($context);

?>