<!--
# Sample information

Patterns:
- Source: apache_request_headers ==> Filters:[]
- Sanitization: substr_replace_prm__<s>(bob)_<i>(50) ==> Filters:[]
- Filters complete: Filters:[]
- Dataflow: assignment
- Context: xss_html_param_a
- Sink: vprintf_prm__<s>(This%d)

State:
- State: Good
- Exploitable: Not found


# Exploit description

1. It is possible to create a javascript context with: javascript:alert(1)
-->
<?php
# Init

# Sample
$tainted = apache_request_headers();
$tainted = $tainted["t"];
$sanitized = substr_replace($tainted, "bob", 50);
$dataflow = $sanitized;
$context = (("<a href=\"" . $dataflow) . "\">link</a>");
vprintf("This%d", $context);

?>