<script setup>
</script>

<template>
    <body>
        <div class="logo"></div>
        <aside></aside>
        <main></main>
    </body>
</template>

<style scoped> 

.logo {grid-area: logo;}
aside {grid-area: aside;}
main {grid-area: main;}


body{
    margin: 0;
    padding: 0;
display: grid;
grid-template-areas:
'logo main'
'aside main';
grid-template-columns: 1fr 4fr;
}


.logo {
     background-color: blue;
     height: 100px;
 }

 aside {
     background-color: red;
 }

 main {
     background-color: green;
   

 }
</style>

