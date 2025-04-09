<script setup lang="ts">
import PatternCube from '@/components/PatternCube.vue';
import PageHeader from "@/components/PageHeader.vue";
import PageFooter from "@/components/PageFooter.vue";
</script>


<template>
    <div class="dwb-app">
        <PatternCube />
        <PageHeader />
        <router-view />     
        <PageFooter />
    </div>
</template>


<style scoped lang="scss">

.dwb-app {
    height: 100vh;
    font-family: "Raleway";
    display: flex;
    flex-direction: column;
}

</style>
