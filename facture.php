<?php

$client = array(
    "nom" => "Camille TROTOT",
    "adresse" => "50 Boulevard du Montparnasse 75014, Paris",
    "mail" => "camille.trotot@gmail.com",
    
);

$numeroFacture = mt_rand(10000, 20000);
$numeroCommande = mt_rand(1000, 9999);

$dateFacture = date("d/m/Y");

$entetes = array("Référence", "Libellé produit", "Prix Unitaire HT", "Quantité", "Prix HT");

$products = array(
    array(
        "ref" => "T-061D",
        "name" => "Canapé 2 places",
        "unitPrice" => 1000.00,
        "qte" => mt_rand(1, 10),

    ),
    array(
        "ref" => "T-072X",
        "name" => "Canapé 3 places",
        "unitPrice" => 1200.00,
        "qte" => mt_rand(1, 10),

    ),
    array(
        "ref" => "T-023Q",
        "name" => "Fauteuil",
        "unitPrice" => 850.00,
        "qte" => mt_rand(1, 10),

    ),
    array(
        "ref" => "T-094P",
        "name" => "Table Basse",
        "unitPrice" => 670.00,
        "qte" => mt_rand(1, 10),

    ), 
    array(
        "ref" => "T-035V",
        "name" => "Meuble TV",
        "unitPrice" => 750.00,
        "qte" => mt_rand(1, 10),

    ),  
   
);


function formatNumber($number)
{
    return (number_format($number, 2, '.', ''));
}


function calcTotalHT($productList)
{
    $totalPrice = 0;

    foreach ($productList as $product) {
        $totalPrice += $product["unitPrice"] * $product["qte"];
    }
    return formatNumber($totalPrice);
}


$TotalHT = calcTotalHT($products);
$tax = formatNumber(($TotalHT * 20) / 100);
$TotalTTC = formatNumber($TotalHT + $tax);




?>