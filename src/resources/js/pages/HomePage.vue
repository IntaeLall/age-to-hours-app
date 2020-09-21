<template>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mb-4">Age from years to hours Calculator</h1>
        <div class="d-sm-flex mb-4">
            <input
                class="w-100 mb-4 mr-sm-4 mb-sm-0"
                type="text" 
                placeholder="Enter your name" 
                v-model="name"
            >
            <input 
                class="w-100"
                type="date" 
                id="birthday" 
                name="birthday" 
                v-model="birthday"
            >
        </div>
        <loading class="mb-4" :loading="loading" />
        <div v-if="!loading && inputsFilled">
            <p>Birthday: {{ formatDate(birthday) }}</p>
            <p>You are {{ birthdayInHours }} hours old</p>
        </div>
        <button 
            class="mb-4" 
            @click="submitBirthday()"
            :disabled="!inputsFilled"
        >
            Submit
        </button>
        <div v-show="errorMessage" class="alert alert-warning" role="alert">
            {{ errorMessage }}
        </div>
        <div v-show="serverErrorMessage" class="alert alert-danger" role="alert">
            Not submitted.
            {{ serverErrorMessage }}
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { formatDate, birthdayToHours } from '../helpers/global';
import loading from '../components/loading'
export default {
    name: 'HomePage',
    components: {
        loading
    },
    data: function() {
        return {
            name: null,
            birthday: null,
            serverErrorMessage: null,
            loading: false
        };
    },
    methods: {
        async submitBirthday(){
            this.loading = true
            try {
                const response = await axios.post(`/api/user-submissions?name=${this.name}&birthday=${this.birthday}`)
                this.loading = false
            } catch(error) {
                this.loading = false
                this.serverErrorMessage = error.response.data.message
            }
            this.name = null
            this.birthday = null
        },
        birthdayToHours,
        formatDate
    },
    computed: {
        birthdayInHours() {
            return birthdayToHours(this.birthday);
        },
        errorMessage() {
            if(!this.name && !this.birthday) return "Please enter your name and birthday."
            if(!this.name) return "Please enter your name."
            if(!this.birthday) return "Please enter your birthday."
            return null
        },
        inputsFilled() {
            return this.name && this.birthday
        }
    }
}
</script>
