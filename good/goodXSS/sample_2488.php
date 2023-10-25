<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_SPECIAL_CHARS) ==> Filters:[Filtered(", &, ', <, >)]
- Sanitization: ctype_alpha ==> Filters:[nums, specials]
- Filters complete: Filters:[nums, specials, Filtered(", &, ', <, >)]
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
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_SPECIAL_CHARS);
if(ctype_alpha($tainted))
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("Hello to '" . $dataflow) . "'");
  print($context);
}

?>