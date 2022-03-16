<?php

namespace Red5g\Services;


class AccountingService {

    public static function contabilizarIngreso($valor_ingreso, $saldo, $tasa, $dias_interes)
    {
        $interes = $saldo * $tasa / 100 / 300 * $dias_interes;
        $capital = $valor_ingreso - $interes;

        $contab = [
            ['code'=>'11100501', 'debit'=>$valor_ingreso, 'credit'=>0],
            ['code'=>'13050501', 'debit'=>0, 'credit'=>$capital],
            ['code'=>'41500501', 'debit'=>0, 'credit'=>$interes]
        ];

        $total_deb = $total_cred = 0;
        foreach($contab as $c){
            $total_cred += $c['credit'];
            $total_deb += $c['debit'];
        }

        return ['total_debit'=>$total_deb, 'total_credit'=>$total_cred, $contab = $contab];
    }
}