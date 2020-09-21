<template>
    <div v-if="loading" class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</template>

<script>
export default {
    name: 'loading',
    props: {
        loading: Boolean,
        default: false
    }
}
</script>