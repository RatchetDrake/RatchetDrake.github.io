import db from '../config/database.js'

export function InsertUser (user) {
    db.query('INSERT INTO user (firstname, lastname) VALUES (?, ?)', [user.firstname, user.lastname])
}

// Ici chaque fonction va contenir différente requete SQL
// Pour chaque requete SQL il nous faudra une fonction