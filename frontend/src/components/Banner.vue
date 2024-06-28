<template>
    <div class="banner">
        <p class="main">Wel<span class="highlight">c</span>ome</p>
        <p class="sub"><span class="highlight">v</span>1.0.0</p>
        <!-- <p class="footer">Last build 2023.09.26</p> -->
    </div>
</template>

<style scoped>
.banner {
	width: 100%;
	background-color: #000;
	color: #fff;
	background-color: #000000;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%23bbbbbb' fill-opacity='0.3' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
	height: 40px;
    display: flex;
    align-items: center;
}

.banner > p {
	color: #fff;
    margin: 0;
    text-align: left;
	display: flex;
	align-items: center;
} 

.main {
	padding-left: 20px;
    font-size: 23px;
	height: 40px;
	line-height: 40px;
	width: 100%;
	flex-grow: 1;
	padding-bottom: 2px;
}

.highlight {
	color: #ff6666;
}

.sub {
	font-size: 12px;
	height: 40px;
	line-height: 40px;
	flex-shrink: 0;
    padding-right: 20px;
}


.footer {
	font-size: 9px;
	flex-shrink: 0;
    padding-right: 20px;
    padding-left: 20px;
}
</style>