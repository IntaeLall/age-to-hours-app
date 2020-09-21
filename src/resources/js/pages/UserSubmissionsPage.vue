<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Created At</th>
                <th scope="col">Age in Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in userSubmissions" :key="(user.id)">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ formatDate(user.birthday) }}</td>
                    <td>{{ formatDate(user.createdAt) }}</td>
                    <td>{{ birthdayToHours(user.birthday) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
import { birthdayToHours, formatDate } from '../helpers/global'
export default {
    name: 'UserSubmissionsPage',
    data: function() {
        return {
            userSubmissions: []
        }
    },
    async mounted() {
        const response = await axios.get('/api/user-submissions')
        this.userSubmissions = response.data.data
    },
    methods: {
        formatDate,
        birthdayToHours
    }
}
</script>
