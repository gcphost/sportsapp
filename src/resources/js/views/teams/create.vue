<template>
    <div>
        <h1>Create Team</h1>

        <form @submit.prevent="createTeam">
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" placeholder="Team name" v-model="team" :class="['form-control', errors.name ? 'is-invalid' : '']">

                    <span v-if="errors.name" class="invalid-feedback" role="alert">{{ errors.name.join(', ') }}</span>
                </div>
            </div>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</template>
<script>
    export default {
        name: 'TeamCreate',
        data() {
            return {
                team: null,
                errors: {},
            }
        },
        methods: {
            createTeam() {
                this.errors={};

                axios.post(`${window.APP_URL}/api/team`, {
                    name: this.team,
                })
                .then(res => {
                    this.team = null;
                    this.$router.push(`/team/${res.data.id}`);
                })
                .catch(error => {
                    if (error.response.status = 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            }
        }
    }
</script>