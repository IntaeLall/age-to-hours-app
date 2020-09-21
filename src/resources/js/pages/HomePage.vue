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
        <p v-show="inputsFilled">Birthday: {{formattedBirthday}}</p>
        <p v-show="inputsFilled">
            You are {{ birthdayInHours }} hours old
        </p>
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
    </div>
</template>

<script>
    export default {
        name: 'HomePage',
        data: function() {
            return {
                name: null,
                birthday: null,
            };
        },
        methods: {
            birthdayToHours(birthday) {
                const currentDate = new Date(); 
                const birthDate = new Date(birthday).getTime();
                return Math.round((currentDate - birthDate) / (1000*60*60));
            },
            submitBirthday(){
                //Send request
                //Reset
                this.name = null
                this.birthday = null
            }
        },
        computed: {
            birthdayInHours() {
                return this.birthdayToHours(this.birthday);
            },
            formattedBirthday(){
                return new Date(this.birthday).toLocaleDateString('en-GB')
            },
            errorMessage() {
                if(!this.name && !this.birthday) return "Please enter your name and birthday"
                if(!this.name) return "Please enter your name"
                if(!this.birthday) return "Please enter your birthday"
                return null
            },
            inputsFilled() {
                return this.name && this.birthday
            }
        }
    }
</script>
