<!--
# Sample information

Patterns:
- Source: _COOKIE ==> Filters:[]
- Sanitization: is_bool ==> Filters:[nums, letters, specials]
- Filters complete: Filters:[nums, letters, specials]
- Dataflow: assignment
- Context: xss_html_param_a
- Sink: vprintf_prm__<s>(This%d)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init

# Sample
$tainted = $_COOKIE;
$tainted = $tainted["t"];
if(is_bool($tainted))
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("<a href=\"" . $dataflow) . "\">link</a>");
  vprintf("This%d", $context);
}

?>