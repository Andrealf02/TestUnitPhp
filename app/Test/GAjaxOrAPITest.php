<?php

namespace Red5g\Test;
/**
 * Documentación de Guzzle: http://guzzle.readthedocs.org/en/latest/quickstart.html
 */
use GuzzleHttp\Client;


class GAjaxOrAPITest extends FinsonetTestCase
{
    public function testCorrectResponse()
    {
        /**
         * Creando un nuevo cliente HTTP
         */
        $client = new Client([
                'base_url' => 'http://192.168.1.10'
            ]
        );

        $data = [
            'pago_mensual'=>200000,
            'tasa'=>1.8,
            'plazo'=>72
        ];

        $response = $client->post('/phpunit/app/Ajax/credit_origination/calcular_credito.php', [
            'body'=> $data
        ]);

        /**
         * Probamos que el servidor responda correctamente
         */
        $this->assertEquals(200, $response->getStatusCode());

        /**
         * El método getBody() nos devuelve el cuerpo de
         * la respuesta del servidor.
         */
        $datosRecibidos = json_decode($response->getBody());
        return $datosRecibidos;
    }

    /**
     * El valor calculado en el servidor como 'total descuentos' debe
     * ser igual a la suma de los valores en el array 'descuentos'.
     * @depends testCorrectResponse
     */
    public function testSumaDescuentosHaveCorrectValue($datos_credito)
    {
        $descuentos = array();
        foreach($datos_credito->descuentos as $k => $v){
            $descuentos[$k] = $v;
        }
        $this->assertEquals($datos_credito->total_descuentos, array_sum($descuentos));
    }

    /**
     * El valor calculado en el servidor como 'valor a girar' debe
     * ser realmente el valor de la libranza menos los descuentos.
     * @depends testCorrectResponse
     */
    public function testValorGirarHaveCorrectValue($datos_credito)
    {
        $resta = $datos_credito->valor_libranza - $datos_credito->total_descuentos;
        $this->assertEquals($datos_credito->valor_girar, $resta);
    }
}