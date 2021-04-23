<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <h3>Select a Raffle Item</h3>

                <ul class="list-group">
                    <li class="list-group-item list-group-item-sm" v-for="(item, index) in items" v-bind:key="index">
                        {{item.item}} <br>
                        {{item.sponsor}} <br>
                        worth {{item.value}} pesos
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Raffle",
    data: function() {
        return {
            test: "Sample",
            items: [],
            participants: [],
            inclusive: false
        }
    },
    methods: {
        getAvailable() {
            axios.get('/api/items')
                .then(response=>{
                    if(response.status=200){
                        this.items = response.data
                    }
                })
        },
        getParticipants() {
            axios.get('/api/participants/' + this.inclusive)
                .then(response=>{
                    if(response.status==200) {
                        console.log(response.data)
                    }
                })
        },
        draw() {

        }
    },
    created() {
        this.getAvailable(),
        this.getParticipants()
    }
}
</script>

<style scoped>
.list-group-item {
    cursor: pointer;
}

</style>
