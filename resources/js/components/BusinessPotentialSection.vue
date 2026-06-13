<template>
    <section class="relative bg-vazo-dark-2 py-24 md:py-32 overflow-hidden">

        <!-- Top wave -->
        <div class="absolute top-0 left-0 right-0">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="w-full block" height="56">
                <path d="M0,28 C480,0 960,56 1440,28 L1440,0 L0,0 Z" style="fill: var(--color-vazo-dark)"/>
            </svg>
        </div>

        <!-- Background accent -->
        <div
            class="absolute inset-0 opacity-40 pointer-events-none"
            style="background: radial-gradient(ellipse 60% 50% at 50% 50%, rgba(201,168,76,0.04) 0%, transparent 70%)"
        ></div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8 pt-6">

            <!-- Header -->
            <div ref="headerEl" class="section-fade text-center mb-16">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    Market Opportunity
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('businessPotential.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-2xl mx-auto">
                    {{ t('businessPotential.subtitle') }}
                </p>
            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-6">
                <div
                    v-for="(key, index) in cardKeys"
                    :key="key"
                    ref="cardEls"
                    class="section-fade relative bg-vazo-card border border-vazo-border rounded-xl p-7 overflow-hidden card-glow group"
                    :style="{ transitionDelay: (index * 0.12) + 's' }"
                >
                    <!-- Number badge -->
                    <div class="absolute top-5 right-5 font-serif text-6xl font-bold text-vazo-gold/6 leading-none select-none">
                        {{ String(index + 1).padStart(2, '0') }}
                    </div>

                    <!-- Icon -->
                    <div class="w-12 h-12 rounded-lg bg-vazo-gold/10 border border-vazo-gold/20 flex items-center justify-center mb-5 group-hover:bg-vazo-gold/15 transition-colors">
                        <component :is="cardIcons[index]" class="w-5 h-5 text-vazo-gold" />
                    </div>

                    <h3 class="font-serif text-vazo-cream text-xl font-semibold mb-3 group-hover:text-vazo-gold-light transition-colors duration-300">
                        {{ t(`businessPotential.cards.${key}.title`) }}
                    </h3>
                    <p class="text-vazo-muted text-sm leading-relaxed">
                        {{ t(`businessPotential.cards.${key}.description`) }}
                    </p>

                    <!-- Bottom gold accent line on hover -->
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-vazo-gold/0 to-transparent group-hover:via-vazo-gold/50 transition-all duration-500"></div>
                </div>
            </div>

            <!-- Stats bar -->
            <div ref="statsEl" class="section-fade mt-14 bg-vazo-card border border-vazo-border rounded-xl p-6 md:p-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 divide-x-0 md:divide-x divide-vazo-border">
                    <div
                        v-for="stat in globalStats"
                        :key="stat.label"
                        class="text-center px-4"
                    >
                        <div class="text-gold-gradient font-serif text-3xl font-bold mb-1.5">{{ stat.value }}</div>
                        <div class="text-vazo-muted text-xs font-medium tracking-wide uppercase">{{ stat.label }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="w-full block" height="56">
                <path d="M0,28 C360,56 1080,0 1440,28 L1440,56 L0,56 Z" style="fill: var(--color-vazo-dark)"/>
            </svg>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, h } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const headerEl = ref(null)
const cardEls  = ref([])
const statsEl  = ref(null)

const cardKeys = ['demand', 'access', 'supply']

const globalStats = [
    { value: '$15B+',   label: 'Global Spice Market' },
    { value: '4.5%',    label: 'Annual Growth Rate' },
    { value: '#1',      label: 'Indonesia Origin Quality' },
    { value: '20M+',    label: 'Turkish Food Industry' },
]

const TrendIcon = {
    render: () => h('svg', { fill: 'none', stroke: 'currentColor', 'stroke-width': '2', viewBox: '0 0 24 24' },
        [h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', d: 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' })])
}
const GlobeIcon = {
    render: () => h('svg', { fill: 'none', stroke: 'currentColor', 'stroke-width': '2', viewBox: '0 0 24 24' },
        [h('circle', { cx: '12', cy: '12', r: '10' }),
         h('path', { 'stroke-linecap': 'round', d: 'M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20' })])
}
const HandshakeIcon = {
    render: () => h('svg', { fill: 'none', stroke: 'currentColor', 'stroke-width': '2', viewBox: '0 0 24 24' },
        [h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', d: 'M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11' })])
}

const cardIcons = [TrendIcon, GlobeIcon, HandshakeIcon]

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.12 }
    )
    ;[headerEl.value, statsEl.value, ...cardEls.value].forEach(el => el && observer.observe(el))
})
</script>
