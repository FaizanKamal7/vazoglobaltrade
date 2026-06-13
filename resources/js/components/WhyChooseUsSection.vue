<template>
    <section id="why-us" class="relative bg-vazo-dark py-24 md:py-32 overflow-hidden">

        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-vazo-gold/20 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-5 md:px-8">

            <!-- Header -->
            <div ref="headerEl" class="section-fade text-center mb-16">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    Our Advantages
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('whyUs.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-xl mx-auto">
                    {{ t('whyUs.subtitle') }}
                </p>
            </div>

            <!-- Points grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div
                    v-for="(key, index) in pointKeys"
                    :key="key"
                    ref="cardEls"
                    class="section-fade relative bg-vazo-card border border-vazo-border rounded-xl p-6 overflow-hidden card-glow group"
                    :style="{ transitionDelay: (index * 0.08) + 's' }"
                >
                    <!-- Top-left corner accent -->
                    <div class="absolute top-0 left-0 w-0 group-hover:w-full h-0.5 bg-gradient-to-r from-vazo-gold/60 to-transparent transition-all duration-500"></div>

                    <!-- Icon -->
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-5 transition-colors duration-300"
                         :class="[iconBgs[index], 'border', iconBorders[index]]">
                        <component :is="icons[index]" class="w-5 h-5" :class="iconColors[index]" />
                    </div>

                    <h3 class="font-serif text-vazo-cream text-lg font-semibold mb-2.5 group-hover:text-vazo-gold-light transition-colors duration-300">
                        {{ t(`whyUs.points.${key}.title`) }}
                    </h3>
                    <p class="text-vazo-muted text-sm leading-relaxed">
                        {{ t(`whyUs.points.${key}.description`) }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, h } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const headerEl = ref(null)
const cardEls  = ref([])

const pointKeys = ['sourcing', 'quality', 'supply', 'control', 'documentation', 'partnership']

// Inline SVG icon components
const mkIcon = (d) => ({
    render: () => h('svg', { fill:'none', stroke:'currentColor', 'stroke-width':'2', viewBox:'0 0 24 24' },
        [h('path', { 'stroke-linecap':'round', 'stroke-linejoin':'round', d })])
})

const icons = [
    mkIcon('M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z'),
    mkIcon('M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'),
    mkIcon('M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4'),
    mkIcon('M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'),
    mkIcon('M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'),
    mkIcon('M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'),
]

const iconBgs     = ['bg-vazo-gold/10', 'bg-green-900/20', 'bg-blue-900/20', 'bg-purple-900/20', 'bg-vazo-copper/10', 'bg-teal-900/20']
const iconBorders = ['border-vazo-gold/20', 'border-green-700/25', 'border-blue-700/25', 'border-purple-700/25', 'border-vazo-copper/20', 'border-teal-700/25']
const iconColors  = ['text-vazo-gold', 'text-green-400', 'text-blue-400', 'text-purple-400', 'text-vazo-copper', 'text-teal-400']

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.1 }
    )
    ;[headerEl.value, ...cardEls.value].forEach(el => el && observer.observe(el))
})
</script>
