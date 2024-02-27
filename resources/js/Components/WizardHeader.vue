<script setup>
</script>

<template>
    <div class="header has-background-black m-5">
        <div class="left has-background-primary p-4">

        </div>
        <div class="right has-background-link is-one-quarter p-4">

        </div>
    </div>
</template>

<style scoped>
.header {
        display: grid;
        grid-template-columns: 2fr 0.5fr;
        grid-template-rows: 0.5fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
    }

.left { grid-area: 1 / 1 / 2 / 2; }
.right { grid-area: 1 / 2 / 2 / 3; }
</style>