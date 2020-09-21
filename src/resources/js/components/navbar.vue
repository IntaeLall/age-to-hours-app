<template>
    <nav class="navbar navbar-light">
            <router-link tag="a" class="navbar-brand" to="/">
                Home
            </router-link>
        <ul class="navbar-nav">
            <li class="nav-item">
                <router-link tag="a" class="nav-link" to="user-submissions">
                    View Previous Submissions
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: 'navbar',
    }
</script>
