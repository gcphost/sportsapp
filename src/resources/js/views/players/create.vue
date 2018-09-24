<template>
    <div>
        <h1>{{ this.$route.params.id ? 'Create' : 'Edit' }} Player</h1>

        <form @submit.prevent="submit">
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" placeholder="First Name" v-model="first_name" :class="['form-control', errors.first_name ? 'is-invalid' : '']">

                    <span v-if="errors.first_name" class="invalid-feedback" role="alert">{{ errors.first_name.join(', ') }}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" placeholder="Last Name" v-model="last_name" :class="['form-control', errors.last_name ? 'is-invalid' : '']">

                    <span v-if="errors.last_name" class="invalid-feedback" role="alert">{{ errors.last_name.join(', ') }}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <select placeholder="a" v-model="team_id" :class="['form-control', errors.team_id ? 'is-invalid' : '']">
                        <option v-for="(item, index) in items" :key="index" :value="item.id" >{{item.name}}</option>
                    </select>
                    
                    <span v-if="errors.team_id" class="invalid-feedback" role="alert">{{ errors.team_id.join(', ') }}</span>
                </div>
            </div>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</template>
<script>
    export default {
        name: 'PlayerCreate',
        data() {
            return {
                first_name: null,
                last_name: null,
                team_id: null,
                items: [],
                errors: {},
            }
        },
        created() {
            this.fetchPlayer();
            this.fetch();
        },
        methods: {
            submit() {
                this.errors={};

                axios[this.$route.params.playerId ? 'put' : 'post'](`${window.APP_URL}/api/player/${this.$route.params.playerId || ''}`, {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    team_id: this.team_id,
                })
                .then(res => {
                    this.team = null;
                    this.$router.push(`/team/${res.data.team_id}`);
                })
                .catch(error => {
                    if (error.response.status = 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            fetchPlayer() {
                if (!this.$route.params.playerId) {
                    return;
                }

                axios
                    .get(`${window.APP_URL}/api/player/${this.$route.params.playerId}`)
                    .then(response => {
                        this.player = response.data;
                        this.first_name = this.player.first_name;
                        this.last_name = this.player.last_name;
                        this.team_id = this.player.team_id
                    })
                    .catch(error => console.log(error));
            },
            fetch() {
                axios
                    .get(`${window.APP_URL}/api/teams`)
                    .then(response => {
                        this.items = response.data;

                        if (this.$route.params.id) {
                            this.team_id = this.$route.params.id;
                        }
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>