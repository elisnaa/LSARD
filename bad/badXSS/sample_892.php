<!--
# Sample information

Patterns:
- Source: getallheaders ==> Filters:[]
- Sanitization: nosanitization ==> Filters:[]
- Filters complete: Filters:[]
- Dataflow: assignment
- Context: xss_html_param
- Sink: trigger_error_prm__<c>(E_USER_ERROR)

State:
- State: Bad
- Exploitable: Yes


# Exploit description

1. Escape quotes with "
2. It is possible to create javascript parameters for: img attributes: onerror
-->
<?php
# Init

# Sample
$tainted = getallheaders();
$tainted = $tainted["t"];
$sanitized = $tainted;
$dataflow = $sanitized;
$context = (("<img src=\"" . $dataflow) . "\"/>");
trigger_error($context, E_USER_ERROR);

?>