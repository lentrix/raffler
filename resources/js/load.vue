<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="uri">URI</label>
                    <input type="text" id="uri" v-model="uri" class="form-control">
                    {{uri}}
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" @click="load()">
                        <i class="fa fa-download"></i> Load Participants
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Load",
    data() {
        return {
            data: [],
            uri: null
        }
    },
    methods: {
        load() {
            var config = {
                headers: {"Access-Control-Allow-Origin":"*"}
            }

            axios.get('http://localhost:2323', config)
                .then(response=>{
                    if(response.status==200){
                        console.log(response.data)
                    }
                })
        }
    }
}
</script>
