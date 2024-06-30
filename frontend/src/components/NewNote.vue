<script setup lang="ts">

import { ref } from 'vue';


const emit = defineEmits(['submit']);


const showContent = ref(false);

const title = ref('');
const content = ref('');

</script>


<template>
    <div class="na-nn" @click="showContent = !showContent">
        <div v-if="showContent" @click.stop>
            <input v-model="title" placeholder="Title" />
            <input v-model="content" placeholder="Content" />
            <button @click="emit('submit', { 'title': title, 'content': content })">Submit</button>
        </div>
        <div v-else>
            Click to add note...
        </div>
    </div>
</template>


<style scoped lang="scss">

.na-nn {
    display: flex;
    flex-direction: column;
    width: 200px;
    height: 160px;
    background-color: white;
    border: 1px solid lightgray;
    padding: 8px;
    border-radius: 8px;
    font-size: 13px;
    cursor: pointer;

    & > p:first-of-type {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 18px;
    }
}

</style>

