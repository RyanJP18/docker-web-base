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
    <div class="dwb-nn" @click="showContent = !showContent" @keydown.enter="submit">
        <div class="dwb-nn_Edit" v-if="showContent" @click.stop>
            <input v-model="title" placeholder="Title" />
            <textarea v-model="content" placeholder="Content" rows="5" />
            <button @click="submit">Submit</button>
        </div>
        <div class="dwb-nn_Add" v-else>Click to add note...</div>
    </div>
</template>


<style scoped lang="scss">

.dwb-nn {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 260px;
    height: 200px;
    background-color: white;
    border: 1px solid #eee;
    padding: 8px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;

    &:hover {
        background-color: #baf7ed;
    }

    &_Edit {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    
        & > input {
            width: 100%;
            font-weight: bold;
            font-size: 18px;
            color: #0e7f6c;
        }

        & > textarea {
            width: 100%;
        }

        & > button {
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            background-color: #0e7f6c;
            border-radius: 6px;
            color: white;
            padding: 6px;
        }
    }

    &_Add {
        color: #0e7f6c;
    }
}

</style>

