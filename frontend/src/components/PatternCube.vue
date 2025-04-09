<template>
    <svg class="pc" width="100%" height="100%" style="opacity: 0.3">
        <defs>
            <pattern
                id="pattern-cube"
                x="0"
                y="126"
                patternUnits="userSpaceOnUse"
                width="126"
                height="200"
                viewBox="0 0 10 16"> 
                <g id="cube">
                    <path class="pc_Left" d="M0 0l5 3v5l-5 -3z"></path>
                    <path class="pc_Right" d="M10 0l-5 3v5l5 -3"></path>
                </g>
                <use x="5" y="8" href="#cube"></use>
                <use x="-5" y="8" href="#cube"></use>
            </pattern>
        </defs>
        <rect
            x="0"
            y="0"
            width="100%"
            height="100%"
            fill="url(#pattern-cube)"></rect>
    </svg>
</template>


<style scoped lang="scss">

.pc {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    opacity: 0.3;

    &_Left {
        fill: #D8BFD8;
    }

    &_Right {
        fill: #D8BFD8;
        opacity: 0.5;
    }
}

</style>
