<!--
# Sample information

Patterns:
- Source: getallheaders ==> Filters:[]
- Sanitization: settype_prm__<s>(string) ==> Filters:[]
- Filters complete: Filters:[]
- Dataflow: assignment
- Context: xss_html_param_a
- Sink: printf_func_prm__<s>(Print this: %s)

State:
- State: Bad
- Exploitable: Yes


# Exploit description

1. It is possible to create a javascript context with: javascript:alert(1)
-->
<?php
# Init

# Sample
$tainted = getallheaders();
$tainted = $tainted["t"];
if(settype($tainted, "string"))
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("<a href=\"" . $dataflow) . "\">link</a>");
  printf("Print this: %s", $context);
}

?>