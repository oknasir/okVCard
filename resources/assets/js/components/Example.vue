<template>
    <div class="ui segment">
        I'm an example component!
        <hr>
        Also make a request for logged in user from API using Passport.
        <hr>
        <pre v-on:click="getUser">{{ message }}</pre>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                message: ''
            };
        },

        mounted() {
            console.log('Component ready.');

            this.getUser();
        },

        methods: {

            getUser() {
                this.$http.get('/api/user')
                        .then(response => {
                            console.log(response.data);
                            this.message = JSON.stringify(response.data, null, 4);
                        });
            }
        }
    }
</script>
