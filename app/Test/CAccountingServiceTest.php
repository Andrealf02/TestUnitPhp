<?php

namespace Red5g\Test;

use Red5g\Services\AccountingService;

class CAccountingServiceTest extends FinsonetTestCase
{
    /**
     * Comprueba que la contabilidad generada en un ingreso no
     * esté descuadrada
     */
    public function testDebitoIgualCreditoIngreso()
    {
        $ingreso = 1250000; $dias_interes = 6; $saldo = 3000000; $tasa = 1.8;
        $contab = AccountingService::contabilizarIngreso($ingreso, $saldo, $tasa, $dias_interes);

        $this->assertEquals($contab['total_debit'], $contab['total_credit']);
    }
}