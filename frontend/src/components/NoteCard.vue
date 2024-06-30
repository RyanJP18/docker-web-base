<script setup lang="ts">

import { ref } from 'vue';
import type { INote } from './interfaces/INote';

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
    <div class="na-nc" @click="editCard = !editCard" @keydown.enter="submit">
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

.na-nc {
    display: flex;
    flex-direction: column;
    width: 200px;
    height: 160px;
    background-color: white;
    border: 1px solid lightgray;
    padding: 8px;
    border-radius: 8px;
    font-size: 13px;

    & p:first-of-type {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 18px;
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

