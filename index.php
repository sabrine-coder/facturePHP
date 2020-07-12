<?php include("facture.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="facture.css">
    <title>Facture</title>
</head>  
<body>
        <!-- cette section pour centrer la facture dans une page format a4 -->
    <section class="facture-a4">

        <!-- cette partie contient le logo et les coordonnés de l'entreprise  -->
        <header>
            <section class="compagny">
                <div class="logo">
                    <img id="logo" src="logo.jpg" alt="logo home square">
                </div>
                <div class="compagny-informations">
                    <ul>
                    <li>Adresse: 14 Rue de la Source 75016, Paris</li>
                    <li>Site Web: Home_Square.com</li>
                    <li>E-mail: <a id="mail" href="mailto:square.home@gmail.com">square.home@gmail.com</a></li>
                    <li>Tél: 01.63.45.78</li>
                    </ul>
                </div>
            <section>
            <h1>Facture</h1>
            
        </header>   
            
        <!-- cette partie contient les informations de la facture et les coordonnées du client -->    
        <main>
            <div class="container">

                <div id="facture">
                <p>Facture N°: <?php echo $numeroFacture; ?></p>
                <p>Date: <?php echo $dateFacture; ?></p>
                <p>Commande N°: <?php echo $numeroCommande; ?></p>
                </div>

        <!-- array $client déclaré dans le fichier facture.php -->         
                <div id="client">
                <h1>Facturé à</h1>
                <p><?php echo $client["nom"]; ?></p>
                <p><?php echo $client["adresse"]; ?></p>
                <a id="mail" href="mailto:camille.trotot@.com"><?php echo $client["mail"]; ?></a>
                </div>

            </div>


        <!-- cette partie contient le tableau des produits  --> 
            <section>
                <table>
                <tr>
            
                    <?php 
                    foreach ($entetes as $entete) 
                    {
                        echo("<th> $entete </th> ");
                    } 
                    ?>
                </tr>

                <?php

                foreach ($products as $product) 
                {
                    $unitPriceFormat = formatNumber($product["unitPrice"]);
                    $total = formatNumber($product["unitPrice"] * $product["qte"]);

                    echo("<tr>
                    <th>" . $product["ref"] . "</th>
                    <th>" . $product["name"] . "</th>
                    <th>" . $unitPriceFormat . " €</th>
                    <th>" . $product["qte"] . "</th>
                    <th>" . $total . " €</th>
                    </tr>");
                }

                ?>
                </table>

                <div class="tableTTC">
                    <p><strong>Total HT : </strong><?php echo $TotalHT; ?> €</p>  
                    <p><strong>TVA 20% : </strong><?php echo $tax; ?> €</p>
                    <p><strong>Total TTC : </strong><?php echo $TotalTTC; ?> €</p>     
                </div>

            </section>

        
            <section id='button'>

                <form>
                    <input type="button" value="Imprimer" onClick="window.print()">
                </form>

            </section>


        </main>

        <!-- cette partie contient toute mention obligatoire en France pour un document de cette nature --> 
        <footer>
            <div class="modalite">
                <p>En votre aimable règlement, et avec nos remerciements.
                <br> 
                Conditions de paiement : paiement à réception de facture, à 15 jours.
                <br> 
                Aucun escompte consenti pour règlement anticipé.
                <br> 
                Règlement par virement bancaire ou par chèque.
                <br>
                En cas de retard de paiement, indemnité forfaitaire pour frais de recouvrement : 40 euros (art. L.4413 et L.4416 code du commerce).</p>
            </div>  
        </footer>

    </section>
</body>
</html>