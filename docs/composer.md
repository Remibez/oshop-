https://getcomposer.org/download/

# Utilisation dans un projet

- Créer le fichier composer.json
- Le remplir en précisant les librairies voulues et leur version
- Aller dans le terminal à la racine du projet
- Exécuter la commande : composer install
    - Pour vérifier que ça a bien fonctionné :
        - Vérifier que la dependance se trouve bien dans le dossier vendor ou dans le composer.lock
        - Si jamais on vous propose de faire "sudo apt install composer", c'est que composer n'est pas encore installé sur votre machine, alors faites le "sudo apt install composer" et récommencez le "composer install"
- L'ajout à la main dans le composer.json et le "composer install" peuvent être remplacés par "composer require la-librairie"
- Require autoload au debut du front controller (index.php)

Il existe aussi une commande `composer update` qui va faire un peu comme le install mais en mettant à jour toutes les dépendances du projet (il ignore le composer.lock puis vient le mettre à jour).
ATTENTION : Ne pas en abuser, c'est risqué de tout mettre à jour d'un coup sans tout restester.

Composer va générer un dossier "vendor" avec tout un tas de fichiers dedans. Ces fichiers là, vu qu'on peut les retrouver en une simple commande (composer install), et que ça prend une place folle en mémoire, on ne va jamais les commiter/pusher. Pour indiquer à GIT de les ignorer, il suffit de rajouter une ligne dans le fichier .gitignore du projet : "/vendor".
On dit à GIT d'ignorer le dossier vendor.