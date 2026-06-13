<template>
    <section class="relative bg-vazo-dark py-24 md:py-32 overflow-hidden">

        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-vazo-gold/20 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-5 md:px-8">

            <!-- Header -->
            <div ref="headerEl" class="section-fade text-center mb-16">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    Our Clients
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('markets.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-xl mx-auto">
                    {{ t('markets.subtitle') }}
                </p>
            </div>

            <!-- Markets grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div
                    v-for="(key, index) in marketKeys"
                    :key="key"
                    ref="cardEls"
                    class="section-fade relative flex gap-4 bg-vazo-card border border-vazo-border rounded-xl p-5 overflow-hidden card-glow group"
                    :style="{ transitionDelay: (index * 0.09) + 's' }"
                >
                    <!-- Left accent bar -->
                    <div class="absolute left-0 top-4 bottom-4 w-0.5 rounded-full bg-vazo-gold/0 group-hover:bg-vazo-gold/50 transition-all duration-400"></div>

                    <!-- Icon -->
                    <div class="w-12 h-12 flex-shrink-0 rounded-lg flex items-center justify-center border"
                         :class="[iconBgs[index], iconBorders[index]]">
                        <component :is="icons[index]" class="w-5 h-5" :class="iconColors[index]" />
                    </div>

                    <div>
                        <h3 class="font-serif text-vazo-cream text-base font-semibold mb-1.5 group-hover:text-vazo-gold-light transition-colors duration-300">
                            {{ t(`markets.items.${key}.title`) }}
                        </h3>
                        <p class="text-vazo-muted text-xs leading-relaxed">
                            {{ t(`markets.items.${key}.description`) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA strip -->
            <div ref="ctaEl" class="section-fade mt-14 relative bg-vazo-card border border-vazo-gold/20 rounded-xl p-8 md:p-10 overflow-hidden text-center">
                <!-- Background glow -->
                <div class="absolute inset-0 pointer-events-none"
                     style="background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(201,168,76,0.04) 0%, transparent 70%)"></div>

                <p class="text-vazo-gold text-xs font-medium tracking-[0.2em] uppercase mb-3">B2B Partnership</p>
                <h3 class="font-serif text-vazo-cream text-2xl md:text-3xl font-semibold mb-3">
                    Ready to Partner with Vazo Global Trade?
                </h3>
                <p class="text-vazo-muted-2 text-sm max-w-lg mx-auto mb-7">
                    Whether you're a large distributor or a specialty restaurant, we have a supply solution that fits your needs.
                </p>
                <a
                    href="#contact"
                    @click.prevent="scrollTo('contact')"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-vazo-gold text-vazo-dark font-semibold text-sm tracking-wide rounded hover:bg-vazo-gold-light transition-all duration-300 shadow-lg shadow-vazo-gold/20"
                >
                    Start a Conversation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
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
const ctaEl    = ref(null)

const marketKeys = ['wholesalers', 'restaurants', 'manufacturers', 'retail', 'distributors', 'buyers']

const mkIcon = (d) => ({
    render: () => h('svg', { fill:'none', stroke:'currentColor', 'stroke-width':'2', viewBox:'0 0 24 24' },
        [h('path', { 'stroke-linecap':'round', 'stroke-linejoin':'round', d })])
})

const icons = [
    mkIcon('M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'),
    mkIcon('M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'),
    mkIcon('M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'),
    mkIcon('M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'),
    mkIcon('M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3'),
    mkIcon('M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'),
]

const iconBgs     = ['bg-vazo-gold/10', 'bg-orange-900/20', 'bg-red-900/20', 'bg-blue-900/20', 'bg-green-900/20', 'bg-purple-900/20']
const iconBorders = ['border-vazo-gold/20', 'border-orange-700/25', 'border-red-700/25', 'border-blue-700/25', 'border-green-700/25', 'border-purple-700/25']
const iconColors  = ['text-vazo-gold', 'text-orange-400', 'text-red-400', 'text-blue-400', 'text-green-400', 'text-purple-400']

function scrollTo(id) {
    document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' })
}

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.1 }
    )
    ;[headerEl.value, ctaEl.value, ...cardEls.value].forEach(el => el && observer.observe(el))
})
</script>
