<script setup lang="ts">
import { ref, onBeforeMount } from 'vue';
import Banner from './components/Banner.vue'
import LoadingSpinner from './components/LoadingSpinner.vue'
import type { IExample } from './interfaces/IExample';


const examples = ref([] as IExample[]);
const loading = ref(true);


const search = () => {
	const url = "http://localhost:8000/api/targets";

	const options = {
		method: "GET",
		headers: {
			Accept: "application/json",
			"Content-Type": "application/json;charset=UTF-8",
		}
	};

	examples.value.length = 0;
	loading.value = true;

	fetch(url, options)
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			loading.value = false;
		})
		.catch(() => {
			debugger;
			loading.value = false;
		});
};


onBeforeMount(() => search());

</script>

<template>
	<div class="app">
		<Banner />
		<LoadingSpinner :loading="loading" />
		
		<div class="wrapper">
			
		</div>
	</div>
	
</template>

<style scoped>
.app {
	width: 100%;
	height: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.wrapper {
	width: 620px;
	max-width: 100%;
	flex-grow: 1;
    display: flex;
    flex-direction: column;
	align-items: center;
	justify-content: center;
	margin-top: 20px;
	margin-bottom: 20px;
	padding-left: 8px;
	padding-right: 8px;
}

</style>
