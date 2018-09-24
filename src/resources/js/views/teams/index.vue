<template>
    <div>
        <h1>All Teams</h1>

        <ul>
            <li v-for="(item, index) in items" :key="index">
                <router-link :to="{ path: `/team/${item.id}` }">{{ item.name }}</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        name: 'TeamsIndex',
        data() {
            return {
                items: [],
            }
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch() {
                axios
                    .get(`${window.APP_URL}/api/teams`)
                    .then(response => this.items = response.data)
                    .catch(error => console.log(error));
            }
        }
    }
</script>