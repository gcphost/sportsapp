<template>
    <div id="root">
        <div class="navbar navbar-default">
            <div class="navbar-brand">
                <router-link to="/">Sports App</router-link>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><router-link to="/team/create">Create Team</router-link></li>
            </ul>
        </div>
        <router-view></router-view>
    </div>
</template>