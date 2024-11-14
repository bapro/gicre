<?php
	$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://191.97.91.43/WSAutorizaciones/WSAutorizacionLaboratorio.asmx?WSDL",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => 
		'<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
		<soap:Header>
		<AuthenticationHeader xmlns="https://arssenasa.gob.do/">
		<Cedula>001-0945751-5</Cedula>
		<Password>dmfvmxm2</Password>
		<Proveedo>12077</Proveedo>
		</AuthenticationHeader>
		</soap:Header>
		<soap:Body>
		<ConsultarAfiliado xmlns="https://arssenasa.gob.do/">
		<TipoDocumento>2</TipoDocumento>
		<NumDocumento>021827151</NumDocumento>
		</ConsultarAfiliado>
		</soap:Body>
		</soap:Envelope>',
		CURLOPT_HTTPHEADER => array("content-type: text/xml"),
		))
		;

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		//echo $response;
		}
$response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
$xml = new SimpleXMLElement($response);
$body = $xml->xpath('//soapBody ')[0];
$array = json_decode(json_encode((array)$body), TRUE); 
//print_r($array);
echo  $array['ConsultarAfiliadoResponse']['ConsultarAfiliadoResult']['Cedula'];




?>
