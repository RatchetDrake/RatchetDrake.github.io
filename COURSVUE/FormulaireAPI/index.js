/* Dans le package.json on a mis type module pour utiliser les import au lieu des require */

import express from 'express';
import cors from "cors";
import Router from './routes/routes.js'

const Server = express(); // J'initialise mon serveur

Server.use(express.json()) // Je dit a mon serveur que j'utilise le serveur par défaut

Server.use(cors()); // Je dit a mon serveur que j'utilise la stratégie CORS (Cross-Origin Resource Sharing)

Server.use(Router) // Je dit à mon serveur que j'utilise le fichier routeur que je vais créer

Server.listen(5000, () => console.log('Démarrer'))

