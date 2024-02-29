import express from "express"

// import BDD from "../controllers/formulaireCtrl.js";
import { CreateUser } from "../controllers/formulaireCtrl.js";

const router = express.Router();

// router.post('/createuser', BDD.CreateUser)
router.post('/createuser', CreateUser)
// La route qui ce nomme /createuser va ramener

export default router
// Les routes servent à rediriger notre application Vue vers les différents controlers