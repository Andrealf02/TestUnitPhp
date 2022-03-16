<?php

namespace Red5g\Test;

use Red5g\Services\AccountingService;

class EAccountingServiceDependencyTest extends FinsonetTestCase
{
    /**
     * @return array El valor devuelto por esta función será utilizado por otra
     * que especifica la dependencia en una anotación.
     */
    public function testDebitoIgualCreditoIngreso()
    {
        $ingreso = 1250000; $dias_interes = 6; $saldo = 3000000; $tasa = 1.8;
        $contab = AccountingService::contabilizarIngreso($ingreso, $saldo, $tasa, $dias_interes);

        $this->assertEquals($contab['total_debit'], $contab['total_credit']);

        return $contab;
    }

    /**
     * @depends testDebitoIgualCreditoIngreso
     */
    public function testContabIsNotEmpty(array $contab)
    {
        $this->assertNotEmpty($contab);
    }
}