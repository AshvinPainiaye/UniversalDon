# Objectifs

Vous devez mettre en place un système qui mettra en relation des associations caritatives et des personnes qui veulent faire des dons matériels.

# Brief

Tout part d'un constat : beaucoup de personnes ont des objets qu'ils n'utilisent mais n'ont pas le temps de s'en débarrasser (Il faut s'organiser pour aller à la déchetterie) ou pensent que c'est dommage de jeter quelque chose qui peut encore servir. D'un autre côté, les associations sont constamment en recherche de dons. 

L'application devra mettre en relations les 2 parties. 

Vous devrez prévoir 2 parties distinctes avec des fonctionnalités différentes : 
* Une partie pour l'association
* Une autre partie pour le particulier qui veut faire un don 

Chaque partie possède une interface de connexion. 

Vous devez prévoir une interface d'inscription pour particuliers et associations.

## Les associations

Une association se connecte à son espace sécurisé. Une fois connectée, elle peut voir la liste des dons disponibles créés par les particuliers. 

Une fois qu'elle est intéressée par un don, elle peut signaler au particulier qu'elle est intéressée en cliquant sur le bouton "nous sommes intéressés" et envoie une "requête" pour récupérer le don. Si le particulier confirme la demande alors les informations de contact du particulier sont envoyés à l'association. Ils se mettront d'accord par la suite pour les modalités de récupération du don.

> Les informations de contact du particulier ne sont pas directement affichées (pour ne pas être harcelé). C'est en acceptant la demande de l'association que les informations de contact (email ou tél) sont envoyés à l'association.

## Le particulier

Un particulier doit aussi avoir un espace sécurisé. Il doit donc pouvoir s'inscrire sur la plateforme. 

Il peut créer un don qui peut être de différentes catégories : vêtements, jouets, meubles, etc. 

Dans son espace, il peut voir tous ses dons mais aussi les associations intéressées par leurs dons. Le particulier peut avoir accès une description entrée par l'association.

C'est le particulier qui décide quelle association bénéficiera de son don en cliquant sur le bouton "je fais le don".

En cliquant sur ce bouton, l'association reçoit par email les coordonnées du bienfaiteur.

# Techniques

* Vous devez utiliser Symfony et tous les bundles que vous estimez utiles. 
* Utilisez un seul compte github. 
* Utilisez les méthodes agiles pour organiser votre travail et un Trello public
* Votre code doit être soigné (indentation, nom des variables équivoques, etc.)

*Allez au plus simple et au plus efficace*.

Vous devez présenter au minimum les fonctionnalités demandées. Des fonctionnalités pertinentes supplémentaires sont aussi appréciées.

# Aller plus loin

Comme évoqué plus haut, toutes fonctionnalités supplémentaires est apprécié. Comme par exemple, permettre de mettre des photos des dons. 

Les 2 parties peuvent recevoir des notifications par email aux différents événements (requête de don, réponse à la requête).
