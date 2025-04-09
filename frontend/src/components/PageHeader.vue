<template>
    <div class="pb">
        <p class="pb_main">docker<span class="highlight"> vue laravel </span>starter</p>
        <p class="pb_sub"><span class="highlight">v</span>1.1.0</p>
    </div>
</template>


<style scoped lang="scss">

.pb {
	width: 100%;
	background-color: #0d313a;
	color: #fff;
	height: 40px;
    display: flex;
    align-items: center;
	padding-left: 20px;
	padding-right: 20px;

	& span {
		color: #17d4b4;
	}

	&_main {
		font-size: 24px;
		flex-grow: 1;
	}

	&_sub {
		font-size: 14px;
		flex-shrink: 0;
	}
}

</style>