<template>
    <div>
        <button @click="questionShow = !questionShow">Nouveau Termes</button>
        <div v-if="questionShow">
            <label for="terme">Terme :</label>
            <input type="text" v-model="Terme">
            <br>
            <label for="definition">Definition :</label>
            <input type="text" v-model="Def">
            <button>OK</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'TermesView',
        data() {
            return {
                questionShow : false,
                Terme : '',
                Def: ''
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>