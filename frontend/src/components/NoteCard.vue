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
            <div class="dwb-nc_Header">
                <p>{{ title }}</p>
                <button @click.stop="emit('remove', note)">✖</button>
            </div>
            <p>{{ content }}</p>
        </div>
        <div class="dwb-nc_Edit" @click.stop v-else>
            <input v-model="title" placeholder="Title" />
            <textarea v-model="content" placeholder="Content" rows="5"/>
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
    border: 1px solid #eee;
    padding: 10px;
    border-radius: 8px;
    font-size: 13px;
    overflow: hidden;
    cursor: pointer;

    &:hover {
        background-color: #baf7ed;
    }

    &_Header {
        margin-bottom: 16px;
        display: flex;
        justify-content: space-between;

        & > p {
            font-weight: bold;
            font-size: 20px;
            color: #0e7f6c;
        }

        & > button {
            background-color: red;
            font-size: 14px;
            width: 30px;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;

            &:hover {
                background-color: firebrick;
            }
        }
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
}

</style>

