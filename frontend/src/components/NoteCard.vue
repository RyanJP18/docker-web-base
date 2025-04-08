<script setup lang="ts">

import { ref } from 'vue';
import type { INote } from '@/interfaces/INote';

const props = withDefaults(defineProps<{
    note: INote;
}>(), {
});

const emit = defineEmits(['submit', 'remove']);


const title = ref(props.note.title);
const content = ref(props.note.content);

const editCard = ref(false);


const submit = () => {
    editCard.value = false;

    emit('submit', { 'id': props.note.id, 'title': title.value, 'content': content.value });
};

</script>


<template>
    <div class="dwb-nc" @click="editCard = !editCard" @keydown.enter="submit">
        <div v-if="!editCard">
            <p>{{ title }}</p>
            <p>{{ content }}</p>
            <button @click.stop="emit('remove', note)">X</button>
        </div>
        <div @click.stop v-else>
            <input v-model="title" placeholder="Title" />
            <input v-model="content" placeholder="Content" />
            <button @click="submit">Submit</button>
        </div>
    </div>
</template>


<style scoped lang="scss">

.dwb-nc {
    display: flex;
    flex-direction: column;
    width: 260px;
    height: 200px;
    background-color: white;
    border: 1px solid lightgray;
    padding: 8px;
    border-radius: 8px;
    font-size: 13px;
    overflow: hidden;
    cursor: pointer;

    & p:first-of-type {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 18px;
    }

    & button {
        background-color: red;
        padding: 0;
        width: 30px;
        line-height: 13px;
        height: 18px;
        color: white;
        font-size: 13px;
        font-weight: bold;
    }

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

