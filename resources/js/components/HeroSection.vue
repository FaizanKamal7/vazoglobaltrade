<template>
    <section
        id="home"
        class="relative min-h-screen flex items-center overflow-hidden bg-vazo-dark"
    >
        <!-- ── Background photo — full width cover ────────────────────────── -->
        <div class="absolute inset-0 overflow-hidden">
            <img
                src="https://www.thedailymeal.com/img/gallery/how-to-revive-stale-spices/spices_hero.jpg"
                alt=""
                class="w-full h-full object-cover object-center"
                style="opacity: 0.70; filter: saturate(0.7) brightness(0.65); transform: scale(1.03);"
                loading="eager"
                fetchpriority="high"
                @error="e => e.currentTarget.style.display='none'"
            />
        </div>

        <!-- ── Dark gradient overlays — text stays legible over the photo ── -->
        <div
            class="absolute inset-0"
            style="background: linear-gradient(160deg, rgba(20,18,16,0.92) 0%, rgba(20,18,16,0.75) 50%, rgba(20,18,16,0.60) 100%)"
        ></div>
        <!-- Subtle warm glow to anchor the content area -->
        <div
            class="absolute inset-0"
            style="background: radial-gradient(ellipse 80% 60% at 40% 50%, rgba(34,25,18,0.45) 0%, transparent 70%)"
        ></div>
        <!-- Bottom vignette — merges into the next section -->
        <div
            class="absolute bottom-0 left-0 right-0 h-56"
            style="background: linear-gradient(to top, #141210 0%, transparent 100%)"
        ></div>

        <!-- ── Decorative concentric circles (top-right) ───────────────────── -->
        <div class="absolute -top-24 -right-24 pointer-events-none select-none">
            <div class="w-[500px] h-[500px] rounded-full border border-vazo-gold/8"></div>
            <div class="absolute inset-12 rounded-full border border-vazo-gold/6"></div>
            <div class="absolute inset-24 rounded-full border border-vazo-gold/5"></div>
            <div class="absolute inset-36 rounded-full border border-vazo-copper/8"></div>
        </div>

        <!-- ── Decorative circles (bottom-left) ───────────────────────────── -->
        <div class="absolute -bottom-32 -left-32 pointer-events-none select-none opacity-50">
            <div class="w-[400px] h-[400px] rounded-full border border-vazo-gold/6"></div>
            <div class="absolute inset-12 rounded-full border border-vazo-gold/5"></div>
        </div>

        <!-- ── Vertical gold accent line ──────────────────────────────────── -->
        <div class="absolute left-0 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-vazo-gold/30 to-transparent hidden md:block"></div>

        <!-- ── Scattered gold dots ─────────────────────────────────────────── -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-20">
            <div v-for="(dot, i) in dots" :key="i"
                class="absolute rounded-full bg-vazo-gold"
                :style="dot"
            ></div>
        </div>

        <!-- ── Main content ────────────────────────────────────────────────── -->
        <div class="hero-content relative z-10 w-full max-w-7xl mx-auto px-5 md:px-8 py-32 md:py-36">
            <div class="max-w-3xl">

                <!-- Pre-headline badge -->
                <div class="inline-flex items-center gap-2 mb-6">
                    <span class="h-px w-10 bg-vazo-gold/60"></span>
                    <span class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase">
                        Indonesia → Turkey
                    </span>
                    <span class="h-px w-10 bg-vazo-gold/60"></span>
                </div>

                <!-- Main headline -->
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold text-vazo-cream leading-tight mb-6">
                    {{ t('hero.headline') }}
                </h1>

                <!-- Gold underline accent -->
                <div class="h-px w-24 bg-gradient-to-r from-vazo-gold to-transparent mb-7"></div>

                <!-- Subtitle -->
                <p class="text-vazo-muted-2 text-base md:text-lg leading-relaxed max-w-2xl mb-10">
                    {{ t('hero.subtitle') }}
                </p>

                <!-- CTA buttons -->
                <div class="flex flex-wrap gap-4 mb-12">
                    <a
                        href="#products"
                        @click.prevent="scrollTo('products')"
                        class="inline-flex items-center gap-2 px-7 py-3.5 bg-vazo-gold text-vazo-dark font-semibold text-sm tracking-wide rounded hover:bg-vazo-gold-light transition-all duration-300 shadow-lg shadow-vazo-gold/20"
                    >
                        {{ t('hero.cta1') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a
                        href="#contact"
                        @click.prevent="scrollTo('contact')"
                        class="inline-flex items-center gap-2 px-7 py-3.5 border border-vazo-gold/60 text-vazo-cream font-medium text-sm tracking-wide rounded hover:border-vazo-gold hover:bg-vazo-gold/8 transition-all duration-300"
                    >
                        {{ t('hero.cta2') }}
                    </a>
                </div>

                <!-- Badges -->
                <div class="flex flex-wrap gap-3">
                    <span
                        v-for="badge in badges"
                        :key="badge"
                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 border border-vazo-gold/25 bg-vazo-gold/5 rounded text-vazo-muted-2 text-xs font-medium tracking-wide"
                    >
                        <span class="w-1.5 h-1.5 rounded-full bg-vazo-gold/60 flex-shrink-0"></span>
                        {{ badge }}
                    </span>
                </div>
            </div>
        </div>

        <!-- ── Bottom wave ─────────────────────────────────────────────────── -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 64" preserveAspectRatio="none" class="w-full block" height="64">
                <path d="M0,32 C360,64 1080,0 1440,32 L1440,64 L0,64 Z" style="fill: var(--color-vazo-dark-2)"/>
            </svg>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const badges = computed(() => [
    t('hero.badges.origin'),
    t('hero.badges.quality'),
    t('hero.badges.b2b'),
    t('hero.badges.market'),
])

const dots = [
    { width:'4px', height:'4px', top:'18%',  left:'62%',  opacity: 0.7 },
    { width:'6px', height:'6px', top:'34%',  left:'78%',  opacity: 0.5 },
    { width:'3px', height:'3px', top:'55%',  left:'70%',  opacity: 0.6 },
    { width:'5px', height:'5px', top:'72%',  left:'85%',  opacity: 0.4 },
    { width:'4px', height:'4px', top:'25%',  left:'90%',  opacity: 0.5 },
    { width:'3px', height:'3px', top:'44%',  left:'58%',  opacity: 0.4 },
    { width:'6px', height:'6px', top:'65%',  left:'50%',  opacity: 0.3 },
    { width:'4px', height:'4px', top:'12%',  left:'75%',  opacity: 0.6 },
]

function scrollTo(id) {
    document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' })
}
</script>
