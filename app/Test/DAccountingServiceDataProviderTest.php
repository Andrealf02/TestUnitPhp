<?php

namespace Red5g\Test;

use Red5g\Services\AccountingService;

class DAccountingServiceDataProviderTest extends FinsonetTestCase
{
    /**
     * @dataProvider valuesProvider
     */
    public function testDebitoIgualCreditoIngreso($ingreso, $dias_interes, $saldo, $tasa)
    {
        $contab = AccountingService::contabilizarIngreso($ingreso, $saldo, $tasa, $dias_interes);

        $this->assertEquals($contab['total_debit'], $contab['total_credit']);
    }

    /**
     * Los dataProviders devuelven un array de arrays. Cada sub-array
     * contiene los parámetros que necesita la función que llama al dataProvider.
     *
     * @return array valores utilizados para simular múltiples ingresos
     */
    public function valuesProvider()
    {
        return [
            [1250000, 6, 3000000, 1.8],
            [3453453, 5, 3567000, 2.1],
            [12873495, 20, 50000000, 1.6],
            [500000, 3, 12450500, 1.9],
            [670800, 11, 32000600, 2]
        ];
    }
}