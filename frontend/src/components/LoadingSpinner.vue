<script setup lang="ts">

withDefaults(defineProps<{
    loading: boolean;
}>(), {
});

</script>


<template>
    <div class="ls" :class="loading ? '' : 'hidden'">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</template>


<style scoped lang="scss">

.ls {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    color: #17d4b4;
    margin-top: 20px;

    &.hidden {
        visibility: hidden;
    }

    & div {
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid currentColor;
        border-radius: 50%;
        animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: currentColor transparent transparent transparent;

        &:nth-child(1) {
            animation-delay: -0.45s;
        }

        &:nth-child(2) {
            animation-delay: -0.3s;
        }

        &:nth-child(3) {
            animation-delay: -0.15s;
        }
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

</style>