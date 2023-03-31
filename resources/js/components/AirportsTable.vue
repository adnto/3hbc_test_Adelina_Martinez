<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(airport, index) in airports" :key="index">
                    <td>{{ airport.name }}</td>
                    <td>{{ airport.code }}</td>
                    <td>{{ airport.city }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                airports: []
            };
        },
        mounted() {
            axios.get('/api/airports')
                .then(response => {
                    this.airports = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
</script>
