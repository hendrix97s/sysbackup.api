<template>
    <div class="container-fluid">
        <div class="menu">
            <ul>
                <li><i class="fas fa-landmark"></i></li>
                <li><i class="fas fa-user-edit"></i></li>
                <li><i class="fas fa-key"></i></li>
                <li><i class="fas fa-user-plus"></i></li>
                <li><i class="fas fa-user-ninja"></i></li>
            </ul>
        </div>
        <div class="body">
            
            <div class="key center">
                <button class="btn  btn-generate-key" @click="generate_key()"><i class="fas fa-sync-alt"></i> KEY</button>
                <input class="box-generate-key" type="text" v-model="key">
                <div class="text-generate-key center">
                    <h2>AVISO!</h2>
                    <p>
                        O token é gerado uma unica vez, 
                        por questão de segurança o mesmo não será salvo na base de dados.
                        <br> Sendo assim, é recomendavel que guarde seu token de maneira segura para que outras pessoas nao tenhas acesso a sua conta.
                    </p>

                    <p>PROTEJA SEU TOKEN!</p>
                </div>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                key: null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
             generate_key: function(){
                axios.post('/dashboard/key')
                .then(response => (
                    this.key = response.data
                )) 

            }
        }
    }
</script>
