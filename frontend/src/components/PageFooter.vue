<template>
    <div class="pf">
        <div class="pf_Block">
            <p class="pf_Block_Header">About</p>
            <p class="pf_Block_Link">This is a base for automatically constructing a Docker network consisting of a TypeScript/Vue SPA and headless PHP/Laravel API with basic configuration, testing and deployment.</p>
        </div>
        <div class="pf_Block">
            <p class="pf_Block_Header">Bugs & Requests</p>
            <p class="pf_Block_Link">If you have any issues or suggestions, please file them on the <a href="https://github.com/RyanJP18/docker-vue-laravel-starter" target="_blank">docker-vue-laravel-starter</a> issue tracker.</p>
        </div>
    </div>
</template>


<style scoped lang="scss">

.pf {
	width: 100%;
	background-color: #0d313a;
	color: #fff;
    display: flex;
    align-items: center;
    padding: 40px 40px;

    &_Block {
        height: 76px;
        width: 360px;
        
        & + & {
            margin-left: 100px;
        }

        &_Header {
            font-size: 18px;
            color: #17d4b4;
            font-weight: bold;
            margin-bottom: 6px;
        }

        &_Link {
            font-size: 16px;
            flex-shrink: 0;
            margin-bottom: 2px;
        }
    }

}

</style>