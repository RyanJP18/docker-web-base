<script setup lang="ts">

import { ref } from 'vue';

const emit = defineEmits(['submit']);


const showContent = ref(false);

const title = ref('');
const content = ref('');


const submit = () => {
    showContent.value = false;

    emit('submit', { 'title': title.value, 'content': content.value });
};

</script>


<template>
    <div class="na-nn" @click="showContent = !showContent" @keydown.enter="submit">
        <div v-if="showContent" @click.stop>
            <input v-model="title" placeholder="Title" />
            <input v-model="content" placeholder="Content" />
            <button @click="submit">Submit</button>
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

    & input {
        width: 100%;

        &:first-of-type {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 18px;
        }
    }
}

</style>

