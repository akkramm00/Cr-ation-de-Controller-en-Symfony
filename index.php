<html>
  <head>
    <title>Les Controllers en Symfony</title>
  </head>
  <body>
<h1>Création du Contrôleur</h1>
    <p>
      Il existe plusieurs façcons de créer un controleur/ en créant un fichier PHP dédié à une classe controleur ou en utilisant les lignes de commandes.

      Ainsi, si l'on souhaite créer une classe controleur "à la main " dans un fichier PH¨P, il conviendra de la placer dans le dossier "src" puis dans un dossier "contro'ller".

      Il convient également de créer une classe controller par fichier , et celui-ci portera le même nom que la classe. A l'interieur de la classe , nous pouvons utiliser autant de méthode que vous le souhaitons.

      ==> Conseil: 
      utilisez "Codacy", " SymfonyInseight ", "CodeClimate" pour auditer la qualité de notre code. En effet, ils permettent de détécter une fonction surchargée de notre code.
    </p>

    <h2>Utiliser MakerBundle</h2>

    <p>
      Symfony Maker est un pack qui nous aide a créer des contyrollers, des formulaires , des tests et bien plus encore .

      Tout d'abord, assurons-nous que le bundle soit bien installé en consultant le fichier"composer.json; si ce n'est pas le cas , on tape la commande suivante:

      "$ composer require --dev symfony/maker-bundle"

      Pour connaitre plus de fonctionnalités qu'apporte Maker-bundle,
       on utilise la commande suivante :

      "$ php bin/console list make"


      ===> M%aintenant créons un controller avec la ligne de commande suivante:

      "$ php bin/console make:controller NewController"


      Maintenant allons plus loin en créant un controller à partir d'une " Entité  " .Cet ORM de Doctrine permet de gérer tous les éléments de la base de données que nous avons créer à partir d'une entité.

      Le but va être de créer un "CRUD" (Create, Read, Update, Delete), c-à-d les fonctions de base qui permettent de créer , de récupérer, de mettre à jour ou de supprimer des objets.

      Pour cela , nouis utilisons la ligne de commande suivante qui va utiliser une entité déja créé qui se nomme "Figure" :

      "$ php bin/console make: crud Figure "


      Maker va  nouis demander comment nous voulons nommer le nouveau controller. il nouis proposera par défaut de rajouter "Controller " au nom de notre Entité. Puis ,il nous demandera si nous souhaitons générer des tests pour notre controller. Nous pouvons répondre "No" , surtout si nous ne maîtrisons pas encore les tests, mais tester ses controllers est une excellente pratique à adopter.

      ==> Voici le code que Symfony nous a généré dans le nouveau controleur qui se nomme "FigureController" :

      Voir le fichier fFgureController.php
      

      
      
    </p>
  
  </body>
</html>