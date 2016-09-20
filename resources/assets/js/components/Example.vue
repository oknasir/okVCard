<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <hr>
                        Also make a request for logged in user from API using Passport.
                        <hr>
                        <pre v-on:click="getUser">{{ message }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                message: ''
            };
        },

        ready() {
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
