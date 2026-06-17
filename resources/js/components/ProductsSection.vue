<template>
    <section id="products" class="relative bg-vazo-dark py-24 md:py-32 overflow-hidden">

        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-vazo-gold/20 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-5 md:px-8">

            <!-- Section header -->
            <div ref="headerEl" class="section-fade text-center mb-16">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    Our Products
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('products.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-2xl mx-auto">
                    {{ t('products.subtitle') }}
                </p>
            </div>

            <!-- Products grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div
                    v-for="(key, index) in productKeys"
                    :key="key"
                    ref="cardEls"
                    class="section-fade card-glow bg-vazo-card border border-vazo-border rounded-xl overflow-hidden group cursor-pointer"
                    :style="{ transitionDelay: (index * 0.07) + 's' }"
                >
                    <!-- ── Photo area ──────────────────────────────────────── -->
                    <div class="relative h-44 overflow-hidden" :style="{ background: spiceBgs[key] }">

                        <!-- Real spice photo (Pexels / Unsplash CDN — free, no API key) -->
                        <img
                            :src="spicePhotos[key]"
                            :alt="t(`products.items.${key}.name`)"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            style="opacity: 0.72"
                            loading="lazy"
                            decoding="async"
                            @error="e => e.currentTarget.style.display = 'none'"
                        />

                        <!-- Warm color wash overlay (tints photo to match brand palette) -->
                        <div
                            class="absolute inset-0 mix-blend-multiply"
                            :style="{ background: spiceWash[key] }"
                        ></div>

                        <!-- Bottom gradient — smooth card→body transition -->
                        <div class="absolute inset-x-0 bottom-0 h-2/3"
                             style="background: linear-gradient(to top, rgba(46,39,32,0.95) 0%, rgba(46,39,32,0.3) 60%, transparent 100%)">
                        </div>

                        <!-- Subtle glow blob (always visible as atmosphere) -->
                        <div
                            class="absolute inset-0 opacity-20 blur-3xl scale-75 pointer-events-none"
                            :style="{ background: spiceGlows[key] }"
                        ></div>

                        <!-- Spice name tag pinned to bottom of image -->
                        <div class="absolute bottom-3 left-4 z-10">
                            <span class="text-[10px] font-medium tracking-[0.2em] uppercase text-vazo-gold/70">
                                {{ t('products.origin') }}
                            </span>
                        </div>

                        <!-- Gradient top accent bar -->
                        <div class="absolute top-0 left-0 right-0 h-1" :style="{ background: spiceGradients[key] }"></div>
                    </div>

                    <!-- ── Card body ────────────────────────────────────────── -->
                    <div class="p-5">
                        <h3 class="font-serif text-vazo-cream text-lg font-semibold mb-2 group-hover:text-vazo-gold-light transition-colors duration-300">
                            {{ t(`products.items.${key}.name`) }}
                        </h3>
                        <p class="text-vazo-muted text-xs leading-relaxed mb-4 line-clamp-3">
                            {{ t(`products.items.${key}.description`) }}
                        </p>

                        <!-- Origin & grade badges -->
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-vazo-gold/8 border border-vazo-gold/20 text-vazo-gold text-[10px] font-medium tracking-wide">
                                <svg class="w-2.5 h-2.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ t('products.origin') }}
                            </span>
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-vazo-copper/10 border border-vazo-copper/25 text-vazo-copper text-[10px] font-medium tracking-wide">
                                <svg class="w-2.5 h-2.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                {{ t('products.grade') }}
                            </span>
                        </div>
                    </div>

                    <!-- Hover bottom border glow -->
                    <div class="h-px bg-gradient-to-r from-transparent via-vazo-gold/0 to-transparent group-hover:via-vazo-gold/40 transition-all duration-500"></div>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="text-center mt-14 section-fade" ref="ctaEl">
                <p class="text-vazo-muted-2 text-sm mb-5">
                    Looking for custom quantities, blends, or packaging?
                </p>
                <a
                    href="#contact"
                    @click.prevent="scrollTo('contact')"
                    class="inline-flex items-center gap-2 px-8 py-3.5 border border-vazo-gold text-vazo-gold font-medium text-sm tracking-wide rounded hover:bg-vazo-gold hover:text-vazo-dark transition-all duration-300"
                >
                    {{ t('products.learnMore') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const headerEl  = ref(null)
const cardEls   = ref([])
const ctaEl     = ref(null)

const productKeys = ['blackPepper', 'whitePepper', 'cloves', 'cinnamon', 'nutmeg', 'chilli', 'ginger', 'cardamom']

// Spice photos via Unsplash CDN
const spicePhotos = {
    blackPepper: 'https://images.unsplash.com/photo-1599909533731-ca2c84ff7c98?auto=format&fit=crop&w=600&h=440&q=80',
    whitePepper: 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&w=600&h=440&q=80',
    cloves:      'https://images.unsplash.com/photo-1611499012843-7eecc60e5ae4?auto=format&fit=crop&w=600&h=440&q=80',
    cinnamon:    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=600&h=440&q=80',
    nutmeg:      'https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=600&h=440&q=80',
    chilli:      'https://images.unsplash.com/photo-1576045057995-568f588f82fb?auto=format&fit=crop&w=600&h=440&q=80',
    ginger:      'https://images.unsplash.com/photo-1573671494527-b89d251c4cb1?auto=format&fit=crop&w=600&h=440&q=80',
    cardamom:    'https://images.unsplash.com/photo-1638523252780-c10f61bea83b?auto=format&fit=crop&w=600&h=440&q=80',
}

// Color wash applied via mix-blend-mode:multiply
const spiceWash = {
    blackPepper: 'rgba(20,16,10,0.50)',
    whitePepper: 'rgba(200,185,150,0.25)',
    cloves:      'rgba(80,28,8,0.45)',
    cinnamon:    'rgba(140,68,0,0.40)',
    nutmeg:      'rgba(100,48,20,0.40)',
    chilli:      'rgba(160,20,10,0.40)',
    ginger:      'rgba(160,120,20,0.35)',
    cardamom:    'rgba(30,80,30,0.40)',
}

// CSS gradient fallback (shows if photo fails)
const spiceBgs = {
    blackPepper: 'linear-gradient(145deg, #0d0d0d 0%, #1a1a1a 100%)',
    whitePepper: 'linear-gradient(145deg, #1a1812 0%, #2a2518 100%)',
    cloves:      'linear-gradient(145deg, #1a0a05 0%, #2d1208 100%)',
    cinnamon:    'linear-gradient(145deg, #1a0e03 0%, #2d1905 100%)',
    nutmeg:      'linear-gradient(145deg, #160a04 0%, #241508 100%)',
    chilli:      'linear-gradient(145deg, #1a0400 0%, #2d0800 100%)',
    ginger:      'linear-gradient(145deg, #14100a 0%, #231c0e 100%)',
    cardamom:    'linear-gradient(145deg, #071208 0%, #0d1e0e 100%)',
}

// Atmospheric glow blobs
const spiceGlows = {
    blackPepper: 'radial-gradient(circle, #666 0%, transparent 70%)',
    whitePepper: 'radial-gradient(circle, #d4c49a 0%, transparent 70%)',
    cloves:      'radial-gradient(circle, #8B4513 0%, transparent 70%)',
    cinnamon:    'radial-gradient(circle, #C47722 0%, transparent 70%)',
    nutmeg:      'radial-gradient(circle, #A0522D 0%, transparent 70%)',
    chilli:      'radial-gradient(circle, #cc2200 0%, transparent 70%)',
    ginger:      'radial-gradient(circle, #C9A84C 0%, transparent 70%)',
    cardamom:    'radial-gradient(circle, #4a7c3f 0%, transparent 70%)',
}

// Thin top-of-card colour stripe
const spiceGradients = {
    blackPepper: 'linear-gradient(90deg, #1a1a1a, #3d3d3d, #1a1a1a)',
    whitePepper: 'linear-gradient(90deg, #c8bba0, #e8dcc8, #c8bba0)',
    cloves:      'linear-gradient(90deg, #4a2010, #8B4513, #4a2010)',
    cinnamon:    'linear-gradient(90deg, #7B3F00, #C47722, #7B3F00)',
    nutmeg:      'linear-gradient(90deg, #5C3317, #A0522D, #5C3317)',
    chilli:      'linear-gradient(90deg, #7a1000, #cc2200, #7a1000)',
    ginger:      'linear-gradient(90deg, #8B6914, #C9A84C, #8B6914)',
    cardamom:    'linear-gradient(90deg, #2D5A27, #4a7c3f, #2D5A27)',
}

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
