Projet 5 - Créez votre premier blog en PHP
Codacy
vous trouverez la qualité du code suivi via Codacy : 
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/73700b2d806b47849cf0e57ee55851ef)](https://www.codacy.com/manual/Thibault-OC/P5_Blog?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Thibault-OC/P5_Blog&amp;utm_campaign=Badge_Grade)
Installation avec git
⦁	Utiliser la lige de commande git  <code> git clone https://github.com/Thibault-OC/P5_Blog.git </code>
⦁	Déplacé vous dans le dossier du projet avec la commande <code> cd P5</code> 
⦁	Pour une utilisation optimal du projet intaller composer <code> composer install </code>
⦁	Assuré vous d'avoir prealablement activé le mode rewrite sur le serveur.

Modifications des fichiers:
⦁	L'accès a une base de donné est éssentiel pour que le projet fonctionne pour se faire vous devrez importer le fichier bdd.sql dans votre système de gestion de base de données.
⦁	Le changement des information de connexion doit etre changé dans le fichier P5/models/bddManager.php2
<code>
protected function dbConnect(): PDO
{

    $bdd = new PDO('mysql:host=localhost;dbname=nom_base_de_données;charset=utf8', 'id_base_de_données', 'code_base_de_données');
    //$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $bdd;

}
	</code>
 	
	Une foi les infomations modifié renommer le fichier P5/models/bddManager.php2 en P5/models/bddManager.php

