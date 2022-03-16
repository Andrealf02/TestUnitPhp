<?php
/**
 * No usaremos los valores recibidos. Como es un ejemplo,
 * no haremos cálculos y devolveremos unos valores
 * calculados previamente.
 */
$values = (object) $_POST;

$credit_values = [
    'valor_libranza'=>8035598,
    'descuentos'=>[
        'seguro'=>202497,
        'cpm'=>32142,
        'interes_ajuste'=>120534,
        'fabrica_credito'=>360000
    ],
    'total_descuentos'=>715173,
    'valor_girar'=>7320425
];

echo json_encode($credit_values);