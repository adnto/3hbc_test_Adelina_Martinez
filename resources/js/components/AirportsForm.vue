<template>
    <div>
        <form method="POST" @submit.prevent="submitForm">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="name" required>
            </div>
            <div>
                <label for="code">Code:</label>
                <input type="text" id="code" v-model="code" required>
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" id="city" v-model="city" required>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            code: '',
            city: ''
        }
    },
    methods: {
        submitForm() {
            axios.post('/api/airports', {
                name: this.name,
                code: this.code,
                city: this.city
            })
            .then(response => {
                console.log(response.data);
                // Aquí puedes redirigir al usuario a otra página o hacer lo que necesites
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

