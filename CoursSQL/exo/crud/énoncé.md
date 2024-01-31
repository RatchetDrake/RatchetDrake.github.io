Vous créer un Dossier dans exo qui se nomme CRUD.  Dans ce répertoire, vous placerez:
 un fichier index.php
un répertoire Views  avec 4 fichiers à l'intérieur.  create.php , read.php , update.php
un répertoire Controllers  avec 4 fichiers à l'intérieur.  create_ctrl.php , read_ctrl.php , 
update_ctrl.php , delete_ctrl.php

Vous devez créer une base de données que vous nommerez crud avec interclassement
Faite un diagramme UML de cette base de données 
utf8_general_ci ( mb3 ou mb4 )
Dans cette base de données, vous allez créer une table “livre” avec 3 attributs id, titre, ISBN, 
 résumé. 
L’ “id” sera un entier et la clé primaire de la table sera Auto Incrémenté. 
“titre” sera en VARCHAR de 255.
L’ISBN d’un livre est son identifiant -> Il sera un VARCHAR de 50 mais composé uniquement de chiffres.
“résumé” sera un TEXT.

L’index.php affichera un tableau des livres, chaque ligne de ce tableau affichera les 
informations( id, titre, l’ISBN, et le résumé ) de ce livre et permettra aussi  
la suppression, la modification et l’affichage d’un livre via un bouton ou un lien.
L’index.php affichera aussi un bouton permettant la création d’un livre.
create.php affichera le  formulaire de création d'un livre.
update.php affichera le formulaire pré rempli d’un livre afin de le modifier.
read.php affichera une liste à puce des informations du livre.

Les Formulaires:   Ils se composent tous de trois champs: titre, de l’ISBN, du résumé 
et d’un bouton submit.

Vous devrez vérifier que l’ISBN ne contient pas de lettres. Il est impossible d’avoir 
deux livres avec le même ISBN dans la base de données.
