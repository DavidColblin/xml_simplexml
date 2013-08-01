<?php 
// reference to http://codingthis.com/programming/php/quick-xml-to-html-templating-in-php-using-simplexml/

//simplexml error handling

	$XMLfile = "test.xml";
	
	libxml_use_internal_errors(true);
	$xml_obj = null;
	if (!$xml_obj = simplexml_load_file($XMLfile)) {
		$errstr = "";
		foreach (libxml_get_errors() as $error) {
			// $error is an object of type LibXMLError. Use var_dump($error) to examine properties.
			$errstr .= $error->message . "\n";
			//var_dump($error);
		}

		die("<h3>Invalid XML file: $XMLfile </h3>Error opening file: " . $errstr.  "at line " .$error->line . " column " . $error->column);
	}

	
foreach ($xml_obj->method as $method) {
	$method_name = $method["name"];
	$method_endpoint = $method->endpoint;
	$method_description = $method->description;
	
	foreach ($method->parameters->parameter as $param) {
		$param_name = $param["name"];
		$param_type = $param->type;
		$param_description = $param->description;

	}
}

?>

<h1><?php echo $method_name; ?></h1>

<p style="font-weight:bold;"><?php echo $method_endpoint; ?></p>

<p><?php echo $method_description; ?></p>

<p style="font-weight:bold;">Parameters</p>

<table style="padding:10px;" border="1">
	<thead>
		<th>Name</th>
		<th>Data Type</th>
		<th>Description</th>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $param_name; ?></td>
			<td><?php echo $param_type; ?></td>
			<td><?php echo $param_description; ?></td>
		</tr>
	</tbody>
</table>