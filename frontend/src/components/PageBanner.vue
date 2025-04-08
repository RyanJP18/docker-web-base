<template>
    <div class="dwb-pb">
        <p class="dwb-pb_main">docker<span class="highlight"> web </span>base</p>
        <p class="dwb-pb_sub"><span class="highlight">v</span>1.1.0</p>
    </div>
</template>


<style scoped lang="scss">

.dwb-pb {
	width: 100%;
	background-color: #0d313a;
	color: #fff;
	height: 40px;
    display: flex;
    align-items: center;
	padding-left: 20px;
	padding-right: 20px;

	& span {
		color: #0e7f6c;
	}

	&_main {
		font-size: 23px;
		flex-grow: 1;
	}

	&_sub {
		font-size: 14px;
		flex-shrink: 0;
	}
}

</style>