<script setup lang="ts">
import { ref, onBeforeMount } from 'vue';
import Banner from './components/Banner.vue'
import LoadingSpinner from './components/LoadingSpinner.vue'
import NoteCard from './components/NoteCard.vue'
import NewNote from './components/NewNote.vue'
import type { IExample } from './interfaces/IExample';
import type { INote } from './interfaces/INote';


const notes = ref([] as INote[]);
const loading = ref(true);


const apiPath = 'http://localhost:8000/api';

const search = () => {
	const url = apiPath + '/notes';

	const options = {
		method: "GET",
		headers: {
			Accept: "application/json",
			"Content-Type": "application/json;charset=UTF-8",
		}
	};

	notes.value.length = 0;
	loading.value = true;

	fetch(url, options)
		.then((response) => response.json())
		.then((data) => {
			notes.value = data;
			loading.value = false;
		})
		.catch(() => {
			loading.value = false;
		});
};


const uploadNote = (note: INote) => {
	const url = apiPath + '/notes';

	console.log(JSON.stringify(note));

	const options = {
		method: "POST",
		headers: {
			Accept: "application/json",
			"Content-Type": "application/json",
		},
		body: JSON.stringify(note)
	};

	fetch(url, options)
		.then((response) => response.json())
		.then((data) => {})
		.catch(() => {
			loading.value = false;
		});
};


onBeforeMount(() => search());

</script>

<template>
	<div class="na-app">
		<Banner />
		<LoadingSpinner :loading="loading" />
		
		<div class="na-app_Content">
			<NoteCard title="todo" content="- hook this up to the backend - list rendering - the ability to click in and edit" />
			<NoteCard title="don't forget" content="- Add sass to docker base - add backend .env to docker base / copy over migration work"  />
			<NoteCard title="apps" content="- show file differences"  />
			<NoteCard title="learned" content="- use curl to test api paths"  />
			<NoteCard :key="note.id" v-for="note in notes" :title="note.title" :content="note.content" />
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

	&_Content {
		width: 620px;
		max-width: 100%;
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
