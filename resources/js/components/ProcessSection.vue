<template>
    <section id="process" class="relative bg-vazo-dark-2 py-24 md:py-32 overflow-hidden">

        <!-- Top wave -->
        <div class="absolute top-0 left-0 right-0">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="w-full block" height="56">
                <path d="M0,28 C480,0 960,56 1440,28 L1440,0 L0,0 Z" style="fill: var(--color-vazo-dark)"/>
            </svg>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8 pt-6">

            <!-- Header -->
            <div ref="headerEl" class="section-fade text-center mb-20">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    How It Works
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('process.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-xl mx-auto">
                    {{ t('process.subtitle') }}
                </p>
            </div>

            <!-- Steps: Desktop timeline -->
            <div class="hidden md:block relative">
                <!-- Connecting line -->
                <div class="absolute top-[52px] left-[calc(8.33%+28px)] right-[calc(8.33%+28px)] h-0.5 bg-gradient-to-r from-vazo-gold/40 via-vazo-gold/20 to-vazo-gold/40"></div>

                <div class="grid grid-cols-6 gap-4">
                    <div
                        v-for="(key, index) in stepKeys"
                        :key="key"
                        ref="stepEls"
                        class="section-fade flex flex-col items-center text-center"
                        :style="{ transitionDelay: (index * 0.1) + 's' }"
                    >
                        <!-- Circle number -->
                        <div class="relative z-10 w-14 h-14 rounded-full border-2 border-vazo-gold/50 bg-vazo-dark flex items-center justify-center mb-5 group-hover:border-vazo-gold transition-colors">
                            <span class="text-gold-gradient font-serif font-bold text-xl">{{ index + 1 }}</span>
                        </div>
                        <h3 class="font-serif text-vazo-cream text-sm font-semibold mb-2 leading-tight">
                            {{ t(`process.steps.${key}.title`) }}
                        </h3>
                        <p class="text-vazo-muted text-xs leading-relaxed">
                            {{ t(`process.steps.${key}.description`) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Steps: Mobile stacked -->
            <div class="md:hidden space-y-4">
                <div
                    v-for="(key, index) in stepKeys"
                    :key="key"
                    ref="mobileStepEls"
                    class="section-fade flex gap-4 bg-vazo-card border border-vazo-border rounded-xl p-5 card-glow group"
                    :style="{ transitionDelay: (index * 0.08) + 's' }"
                >
                    <!-- Left: number + line -->
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="w-10 h-10 rounded-full border-2 border-vazo-gold/50 bg-vazo-dark flex items-center justify-center flex-shrink-0">
                            <span class="text-gold-gradient font-serif font-bold text-base">{{ index + 1 }}</span>
                        </div>
                        <div v-if="index < 5" class="w-px flex-1 bg-vazo-gold/20 mt-2"></div>
                    </div>
                    <!-- Right: content -->
                    <div class="pt-1 pb-2">
                        <h3 class="font-serif text-vazo-cream text-base font-semibold mb-1.5 group-hover:text-vazo-gold-light transition-colors">
                            {{ t(`process.steps.${key}.title`) }}
                        </h3>
                        <p class="text-vazo-muted text-sm leading-relaxed">
                            {{ t(`process.steps.${key}.description`) }}
                        </p>
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
import { ref, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const headerEl      = ref(null)
const stepEls       = ref([])
const mobileStepEls = ref([])

const stepKeys = ['sourcing', 'quality', 'documentation', 'shipping', 'delivery', 'partnership']

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.1 }
    )
    ;[headerEl.value, ...stepEls.value, ...mobileStepEls.value].forEach(el => el && observer.observe(el))
})
</script>
