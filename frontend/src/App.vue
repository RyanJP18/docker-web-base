<script setup lang="ts">

import { ref, computed, onBeforeMount } from 'vue';
import Banner from './components/PageBanner.vue';
import LoadingSpinner from './components/LoadingSpinner.vue';
import NoteCard from './components/NoteCard.vue';
import NewNote from './components/NewNote.vue';
import type { INote } from './interfaces/INote';


const notes = ref([] as INote[]);
const loading = ref(true);

const apiPath = 'http://localhost:8000/api';
const headers = { Accept: 'application/json', 'Content-Type': 'application/json;charset=UTF-8' };

const search = ref('');
const filteredNotes = computed(() => notes.value.filter(n => n.title.includes(search.value) || n.content.includes(search.value) ));


const pullNotes = async () => {
    loading.value = true;
    fetch(apiPath + '/notes', { method: 'GET', headers: headers })
        .then((response) => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(`Error --- Status: ${response.status} | Message: ${text}`);
                });
            }
            return response.json();
        })
        .then((data) => notes.value = data)
        .catch((error) => alert(error))
        .finally(() => loading.value = false);
};

const uploadNote = async (note: INote) => {
    loading.value = true;
    fetch(apiPath + '/notes', { method: 'POST', headers: headers, body: JSON.stringify(note) })
        .then((response) => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(`Error --- Status: ${response.status} | Message: ${text}`);
                });
            }
            return response.json();
        })
        .then((data) => notes.value.push(data))
        .catch((error) => alert(error))
        .finally(() => loading.value = false);
};

const updateNote = async (note: INote) => {
    loading.value = true;
    fetch(apiPath + '/notes/' + note.id, { method: 'PATCH', headers: headers, body: JSON.stringify(note) })
        .then((response) => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(`Error --- Status: ${response.status} | Message: ${text}`);
                });
            }
            return response.json();
        })
        .then(() => {})
        .catch((error) => alert(error))
        .finally(() => loading.value = false);
};

const removeNote = async (note: INote) => {
    loading.value = true;
    fetch(apiPath + '/notes/' + note.id, { method: 'DELETE', headers: headers })
        .then((response) => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(`Error --- Status: ${response.status} | Message: ${text}`);
                });
            }
			
            notes.value = notes.value.filter(n => n !== note);
        })
        .catch((error) => alert(error))
        .finally(() => loading.value = false);
};


onBeforeMount(() => pullNotes());

</script>


<template>
    <div class="na-app">
        <Banner />
        <LoadingSpinner :loading="loading" />
		
        <div class="na-app_Content">
            <input v-model="search" />
            <NoteCard
                :key="note.id"
                v-for="note in filteredNotes"
                :note="note"
                @submit="updateNote($event)"
                @remove="removeNote($event)" />
            <NewNote @submit="uploadNote($event)" />
        </div>
    </div>
</template>


<style scoped lang="scss">

.na-app {
	width: 100%;
	height: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
    cursor: pointer;

	&_Content {
		width: 100%;
		flex-grow: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: 20px;
		margin-bottom: 20px;
		padding-left: 8px;
		padding-right: 8px;

		& > * + * {
			margin-left: 12px;
		}
	}
}

</style>
