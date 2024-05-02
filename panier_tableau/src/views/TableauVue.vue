<template>
    <div>
        <router-link to="/clickme"><br>Aller à la page ClickMe</router-link>

        <table>
            <thead>
                <tr>
                    <td colspan="6">Panier</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Article</td>
                    <td>Quantité</td>
                    <td>Prix</td>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr v-for="article in articles" :key="article.id">
                    <td>{{ article.name }}</td>
                    <td>{{ article.quantity }}</td> 
                    <td>{{ article.price }} €</td>
                    <td>{{ parseFloat(article.price * article.quantity).toFixed(2) }} €</td>
                    <td><button @click="ModifyArticle(article.id)">Modifier</button></td>
                    <td><button @click="RemoveArticle(article.id)">Supprimer</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>{{ Total().toFixed(2) }} €</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th><input type="text" placeholder="Article" name="article" id="article" :disabled="Button=='Modifier'" v-model="articleName"></th>
                    <th><input type="number" name="quantite" id="quantite" value="0" v-model="articleQuantity"></th>
                    <th><input type="number" name="prix" id="prix" value="0" v-model="articlePrice" :disabled="Button=='Modifier'"></th>
                    <th colspan="3"><button @click="AddArticle()">{{ Button }}</button></th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>



<script>
export default {
    name: 'TableauVue',
    data() {
        return {
            articleId: 1,
            articleName: '',
            articleQuantity: '',
            articlePrice: '',
            articles: [ 
                {
                    id: 0,
                    name: 'Test',
                    quantity: 1,
                    price: 1000
                }
            ],
            Button: 'Ajouter'
        }
    },
    methods: {
        Total() {
            let total = 0;
            this.articles.forEach(article => {
                total += article.price * article.quantity;
            });
            return parseFloat(total)
        },
        AddArticle() {        
            if (this.articleName != '' && this.articleQuantity != '' && this.articlePrice != ''){
                this.articles.push(
                    {
                        id: this.articleId++,
                        name: this.articleName,
                        quantity: parseInt(this.articleQuantity),
                        price: parseFloat(this.articlePrice)
                    }
                )
            } 
            this.articleName = ""
            this.articlePrice = ""
            this.articleQuantity = ""
            this.Button = 'Ajouter'
        },
        RemoveArticle(id) {
            let index = this.articles.findIndex(article => article.id == id)
            this.articles.splice(index, 1)
        },
        ModifyArticle(id) {
            let index = this.articles.findIndex(article => article.id == id)
            let article = this.articles[index]

            this.articleName = article.name
            this.articlePrice = article.price
            this.articleQuantity = article.quantity

            this.Button = 'Modifier'

            this.articles.splice(index, 1)

        }
    }
}
</script>

<style lang="scss">
table {    
    border: 1px solid black;
    border-radius: 15px;
    border-collapse: collapse;
    overflow: hidden;

    
    td,th {
        outline: none;
        padding: 10px;
        border: 1px solid rgb(168, 168, 168);

        
    }
    tr {
        &:nth-child(even) {
            background-color: rgba(192, 192, 192, 0.6)
        }
        &:nth-child(odd) {
            background-color: rgb(236, 236, 236);
        }
    }
    thead {   
        tr {
            td {     
                background-color: rgb(14, 106, 226);
                color: aliceblue;
            }
        }
    }
    input {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid rgb(181, 181, 181);
        outline: none;
    }
    button {
        background-color: rgb(14, 106, 226);
        color: aliceblue;
        border-radius: 5px;
        padding: 10px 55px;
        border: none;
        cursor: pointer;
    }
    tbody {
        button {
            padding: 18px 20px;
            background-color: rgb(8, 187, 231);
        }
        td {
            &:last-child button {                  
                background-color: rgb(193, 58, 46);
            }
        }
    }

}
</style>