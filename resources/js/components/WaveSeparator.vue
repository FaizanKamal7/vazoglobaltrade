<template>
    <div class="w-full leading-none overflow-hidden" :class="wrapClass">
        <svg
            v-if="direction === 'down'"
            viewBox="0 0 1440 80"
            preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg"
            class="w-full block"
            :style="{ height: height + 'px' }"
        >
            <path
                :d="`M0,${h/2} C360,${h} 1080,0 1440,${h/2} L1440,${h} L0,${h} Z`"
                :fill="fill"
            />
        </svg>
        <svg
            v-else
            viewBox="0 0 1440 80"
            preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg"
            class="w-full block"
            :style="{ height: height + 'px' }"
        >
            <path
                :d="`M0,${h/2} C360,0 1080,${h} 1440,${h/2} L1440,0 L0,0 Z`"
                :fill="fill"
            />
        </svg>
    </div>
</template>

<script setup>
const props = defineProps({
    fill:      { type: String,  default: '#141210' },
    height:    { type: Number,  default: 80 },
    direction: { type: String,  default: 'down' },
    wrapClass: { type: String,  default: '' },
})
const h = props.height
</script>
