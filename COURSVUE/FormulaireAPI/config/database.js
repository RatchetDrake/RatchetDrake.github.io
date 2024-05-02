import mysql from "mysql2"

const db = mysql.createPool({
    host: 'localhost',
    user: 'RatchetDrake',
    password: 'Azerty',
    database: 'formulaire'
})

export default db

/* Ici je me connecte à me base de donnée */ 