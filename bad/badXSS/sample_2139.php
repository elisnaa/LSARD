<!--
# Sample information

Patterns:
- Source: _COOKIE ==> Filters:[]
- Sanitization: nosanitization ==> Filters:[]
- Filters complete: Filters:[]
- Dataflow: assignment
- Context: xss_quotes
- Sink: print_func

State:
- State: Bad
- Exploitable: Yes


# Exploit description

1. Create script tag with <script>
2. Quotes are useless inside plain html context for XSS
-->
<?php
# Init

# Sample
$tainted = $_COOKIE;
$tainted = $tainted["t"];
$sanitized = $tainted;
$dataflow = $sanitized;
$context = (("Hello to \"" . $dataflow) . "\"");
print($context);

?>