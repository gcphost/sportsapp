<template>
    <div>
        <h1>Team {{ team.name }}</h1>

        <router-link :to="{ path: `/team/${team.id}/create` }">Create Player</router-link>

        <ul>
            <li v-for="(item, index) in team.players" :key="index" >
                <router-link :to="{ path: `/player/${item.id}` }">{{ item.first_name }} {{ item.last_name }}</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        name: 'TeamView',
        data() {
            return {
                team: {
                    players: [],
                },
            }
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch() {
                axios
                    .get(`${window.APP_URL}/api/team/${this.$route.params.id}`)
                    .then(response => this.team = response.data)
                    .catch(error => console.log(error));
            }
        }
    }
</script>