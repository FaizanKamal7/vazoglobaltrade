<template>
    <section id="about" class="relative bg-vazo-dark-2 py-24 md:py-32 overflow-hidden">

        <!-- Decorative top border line -->
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-vazo-gold/30 to-transparent"></div>

        <!-- Background subtle pattern -->
        <div
            class="absolute inset-0 opacity-3 pointer-events-none"
            style="background-image: repeating-linear-gradient(0deg, rgba(201,168,76,0.03) 0px, transparent 1px, transparent 80px), repeating-linear-gradient(90deg, rgba(201,168,76,0.03) 0px, transparent 1px, transparent 80px);"
        ></div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-start">

                <!-- Left: text content -->
                <div ref="textEl" class="section-fade">
                    <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                        About Vazo Global Trade
                    </p>

                    <h2 class="font-serif text-3xl md:text-4xl lg:text-[2.6rem] text-vazo-cream font-semibold leading-tight mb-5 gold-underline">
                        {{ t('about.title') }}
                    </h2>

                    <p class="text-vazo-gold text-sm font-medium tracking-wide mb-7 mt-8">
                        {{ t('about.subtitle') }}
                    </p>

                    <div class="space-y-4 text-vazo-muted-2 text-[0.94rem] leading-relaxed">
                        <p>{{ t('about.p1') }}</p>
                        <p>{{ t('about.p2') }}</p>
                        <p>{{ t('about.p3') }}</p>
                    </div>

                    <!-- Gold rule -->
                    <div class="mt-8 flex items-center gap-3">
                        <span class="h-px flex-1 bg-gradient-to-r from-vazo-gold/40 to-transparent"></span>
                        <span class="text-vazo-gold/50 text-xs tracking-widest uppercase">Est. 2024</span>
                    </div>
                </div>

                <!-- Right: stats grid -->
                <div ref="statsEl" class="section-fade" style="transition-delay: 0.15s">
                    <div class="grid grid-cols-2 gap-4">
                        <div
                            v-for="key in statKeys"
                            :key="key"
                            class="relative bg-vazo-card border border-vazo-border rounded-xl p-6 overflow-hidden card-glow group"
                        >
                            <!-- Corner accent -->
                            <div class="absolute top-0 right-0 w-12 h-12 overflow-hidden">
                                <div class="absolute top-0 right-0 w-full h-full border-t-2 border-r-2 border-vazo-gold/30 rounded-tr-xl"></div>
                            </div>

                            <div class="text-gold-gradient font-serif text-4xl font-bold mb-2">
                                {{ t(`about.stats.${key}.value`) }}
                            </div>
                            <div class="text-vazo-muted-2 text-sm font-medium tracking-wide">
                                {{ t(`about.stats.${key}.label`) }}
                            </div>
                        </div>
                    </div>

                    <!-- Feature list -->
                    <div class="mt-6 bg-vazo-card border border-vazo-border rounded-xl p-6">
                        <p class="text-vazo-gold text-xs font-medium tracking-[0.2em] uppercase mb-4">What We Offer</p>
                        <ul class="space-y-3">
                            <li
                                v-for="item in offerList"
                                :key="item"
                                class="flex items-start gap-3 text-vazo-muted-2 text-sm"
                            >
                                <svg class="w-4 h-4 text-vazo-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="w-full block" height="56">
                <path d="M0,28 C480,56 960,0 1440,28 L1440,56 L0,56 Z" style="fill: var(--color-vazo-dark)"/>
            </svg>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const textEl  = ref(null)
const statsEl = ref(null)

const statKeys = ['spices', 'grade', 'origin', 'partnership']

const offerList = [
    'Direct sourcing from Indonesian spice farms',
    'Export-grade quality control & certification',
    'Complete import/export documentation',
    'Sea freight logistics management',
    'Long-term B2B supply agreements',
]

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.15 }
    )
    ;[textEl.value, statsEl.value].forEach(el => el && observer.observe(el))
})
</script>
