<script setup lang="ts">

withDefaults(defineProps<{
    title: string;
    content: string;
}>(), {
    modelValue: () => [],
});

</script>


<template>
    <div class="na-nc">
        <p>{{ title }}</p>
        <p>{{ content }}</p>
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

    & > p:first-of-type {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 18px;
    }
}

</style>

