<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <h3>Select a Raffle Item</h3>

        <label><input type="checkbox" v-model="exclusive" @change="getParticipants()"> Exclude Previous Winners</label>

        <ul class="list-group">
          <li
            class="list-group-item list-group-item-sm"
            v-for="(item, index) in items"
            v-bind:key="index"
            @click="pickAWinner(index)"
          >
            {{ item.item }} <br />
            {{ item.sponsor }} <br />
            worth {{ item.value }} pesos
          </li>
        </ul>
      </div>
      <div class="col-md-8">
        <p v-if="index != null">
          Draw for raffle item:
          <strong style="font-size: 1.2em"
            >{{ items[index].item }} from {{ items[index].sponsor }}</strong
          >
        </p>
        <div class="card shadow" v-bind:class="drawBG">
          <div class="card-body">
            <h3 v-if="showControls">Congratulations!!!</h3>
            <div v-if="winner != null" id="winner-box">
              <h1>{{ winner.full_name }}</h1>
              <h3>{{ winner.other_info }}</h3>
            </div>
            <hr />
            <div v-if="showControls">
              <button type="button" @click="commit()" class="btn btn-primary btn-lg float-right">
                <i class="fa fa-save"></i> Commit Winner
              </button>
              <button
                type="button"
                @click="cancel()"
                class="btn btn-danger btn-lg float-right mr-2"
              >
                <i class="fa fa-trash-alt"></i> Cancel
              </button>
            </div>
          </div>
        </div>
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
            exclusive: true,
            showControls: false,
            winner: null,
            index: null,
            drawBG: "bg-warning"
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
            axios.get('/api/participants/' + this.exclusive)
                .then(response=>{
                    if(response.status==200) {
                        this.participants = response.data
                        console.log('participants: ', response.data.length)
                    }
                })
        },
        pickAWinner(index) {
            this.showControls=false;
            this.drawBG = "bg-warning";

            var ln = this.participants.length;
            this.index = index;
            for(var i=0; i<20; i++) {
                setTimeout(()=>this.winner = this.participants[Math.floor(Math.random() * ln)], 150*i)
            }

            setTimeout(()=>{
                this.showControls = true;
                this.drawBG = "bg-confetti";
            }, 150*21);
        },
        cancel() {
            this.winner=null;
            this.index=null;
            this.drawBG="bg-warning";
            this.showControls=false;
        },
        commit() {
            var item = this.items[this.index];
            axios.patch('/api/items/commit/' + this.winner.id + "/" + item.id)
                .then(response=>{
                    if(response.status==200){
                        this.getAvailable();
                        this.getParticipants();
                        this.cancel();
                    }
                })
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

#winner-box h3 {
  margin: 0px;
}

.bg-confetti {
  background-image: url("https://i.pinimg.com/originals/12/4d/e3/124de3d1b5e12f1d8fcec1685e634361.gif");
  background-size: cover;
}
</style>
