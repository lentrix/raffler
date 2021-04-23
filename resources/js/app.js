require('./bootstrap');

import Vue from 'vue'
import Raffle from './raffle'

const app = new Vue({
    el: "#app",
    components: {Raffle}
})
