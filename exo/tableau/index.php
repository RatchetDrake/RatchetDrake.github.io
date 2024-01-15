<!DOCTYPE html>
<html>

<head>
    <style>
        .elite-table {
            border-collapse: collapse;
            width: 100%;
        }

        .elite-table,
        .elite-table th,
        .elite-table td {
            border: 1px solid black;
        }

        .elite-table th,
        .elite-table td {
            padding: 8px;
            text-align: left;
        }

        .elite-table .header {
            background-color: #4CAF50;
            /* Adjust the color to match your screenshot */
            color: white;
        }

        .elite-table .full-width {
            background-color: yellowgreen;
            /* Adjust the color to match your screenshot */
            text-align: center;
        }

        .elite-table .qcm td {
            border: none;
            text-align: center;
        }

        .elite-table .qcm td:not(:last-child) {
            border-right: 1px solid black;
        }

        .elite-table .merge-two {
            text-align: center;
        }

        .elite-table .merge-two td {
            border-bottom: none;
        }

        .elite-table caption {
            caption-side: bottom;
            text-align: left;
            font-style: italic;
        }
    </style>
</head>

<body>

    <table class="elite-table">
        <caption>Tableau 1 : c'est la balise caption de votre tableau</caption>
        <tr class="header">
            <th colspan="1" rowspan="2">ELITE Structure Privée de Formation Professionnelle </th>
            <td colspan="4">Conception et réalisation de sites web BTPM21-ELITEE-2020-2021</td>

        </tr>
        <tr class="header">
            <th colspan="2">Cours HTML5</th>
            <th colspan="2">Cours CSS3</th>


        </tr>
     <tr>
        <td colspan="1" >Un</td>
        <td colspan="2" >QCM</td>
        <td rowspan="2" >Cette cellule occupe deux ligne</td>
     </tr>
     <tr>
        <td>deux</td>
        <td>Examen de fin module session principal janvier 2021</td>
     </tr>
     <tr>
        <td>Trois</td>
        <td colspan="4" >fusion de deux cellules</td>
     </tr>
     <tr>
        <td colspan="5">Cette cellule occupe toute la largeur du tableau s couelur est verte "yellowgreen"</td>
     </tr>
    </table>

</body>

</html>