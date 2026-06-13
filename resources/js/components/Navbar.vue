<template>
    <header
        ref="navEl"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        :class="scrolled ? 'navbar-scrolled' : 'bg-transparent'"
    >
        <div class="max-w-7xl mx-auto px-5 md:px-8 flex items-center justify-between h-[72px]">

            <!-- Logo -->
            <a href="#home" @click.prevent="scrollTo('home')" class="flex flex-col leading-none group">
                <span class="text-vazo-gold font-serif text-lg font-semibold tracking-wide group-hover:text-vazo-gold-light transition-colors">
                    Vazo Global Trade
                </span>
                <span class="text-vazo-muted text-[10px] tracking-[0.2em] uppercase mt-0.5">
                    Indonesian Spices
                </span>
            </a>

            <!-- Desktop nav -->
            <nav class="hidden lg:flex items-center gap-7">
                <a
                    v-for="link in navLinks"
                    :key="link.id"
                    href="#"
                    @click.prevent="scrollTo(link.id)"
                    class="text-sm font-medium tracking-wide text-vazo-muted-2 hover:text-vazo-cream transition-colors duration-200 relative group"
                >
                    {{ t(`nav.${link.key}`) }}
                    <span class="absolute -bottom-1 left-0 w-0 h-px bg-vazo-gold group-hover:w-full transition-all duration-300"></span>
                </a>
            </nav>

            <!-- Right side: language switcher + theme toggle + CTA -->
            <div class="hidden lg:flex items-center gap-5">
                <LanguageSwitcher />
                <button
                    @click="toggleTheme"
                    class="w-8 h-8 rounded-lg border flex items-center justify-center transition-all duration-200 hover:border-vazo-gold/60"
                    :class="theme === 'dark'
                        ? 'border-vazo-border text-vazo-muted-2 hover:text-vazo-gold'
                        : 'border-vazo-border text-vazo-muted-2 hover:text-vazo-gold'"
                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                >
                    <!-- Sun: visible in dark mode (click → go light) -->
                    <svg v-if="theme === 'dark'" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5"/>
                        <path stroke-linecap="round" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <!-- Moon: visible in light mode (click → go dark) -->
                    <svg v-else class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>
                <a
                    href="#contact"
                    @click.prevent="scrollTo('contact')"
                    class="px-5 py-2 text-sm font-medium border border-vazo-gold text-vazo-gold hover:bg-vazo-gold hover:text-vazo-dark transition-all duration-300 rounded tracking-wide"
                >
                    {{ t('nav.contact') }}
                </a>
            </div>

            <!-- Mobile hamburger -->
            <div class="flex lg:hidden items-center gap-3">
                <LanguageSwitcher />
                <button
                    @click="toggleTheme"
                    class="w-8 h-8 rounded-lg border border-vazo-border flex items-center justify-center text-vazo-muted-2 hover:text-vazo-gold hover:border-vazo-gold/60 transition-all duration-200"
                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                >
                    <svg v-if="theme === 'dark'" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5"/>
                        <path stroke-linecap="round" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <svg v-else class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>
                <button @click="mobileOpen = !mobileOpen" class="text-vazo-cream p-1" aria-label="Menu">
                    <svg v-if="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <Transition name="mobile-menu">
            <div
                v-if="mobileOpen"
                class="lg:hidden bg-vazo-dark border-t border-vazo-border px-5 py-4 flex flex-col gap-1"
            >
                <a
                    v-for="link in navLinks"
                    :key="link.id"
                    href="#"
                    @click.prevent="scrollTo(link.id); mobileOpen = false"
                    class="py-3 text-sm font-medium text-vazo-muted-2 hover:text-vazo-gold border-b border-vazo-border/50 transition-colors duration-200 tracking-wide"
                >
                    {{ t(`nav.${link.key}`) }}
                </a>
            </div>
        </Transition>
    </header>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useI18n } from 'vue-i18n'
import LanguageSwitcher from './LanguageSwitcher.vue'
import { useTheme } from '../composables/useTheme.js'

const { t } = useI18n()
const { theme, toggle: toggleTheme } = useTheme()
const scrolled   = ref(false)
const mobileOpen = ref(false)

const navLinks = [
    { id: 'home',    key: 'home' },
    { id: 'about',   key: 'about' },
    { id: 'products',key: 'products' },
    { id: 'why-us',  key: 'whyUs' },
    { id: 'process', key: 'process' },
]

function onScroll() {
    scrolled.value = window.scrollY > 40
}

function scrollTo(id) {
    const el = document.getElementById(id)
    if (el) el.scrollIntoView({ behavior: 'smooth' })
}

onMounted(() => window.addEventListener('scroll', onScroll, { passive: true }))
onBeforeUnmount(() => window.removeEventListener('scroll', onScroll))
</script>

<style scoped>
.mobile-menu-enter-active,
.mobile-menu-leave-active {
    transition: opacity 0.2s ease, transform 0.2s ease;
}
.mobile-menu-enter-from,
.mobile-menu-leave-to {
    opacity: 0;
    transform: translateY(-8px);
}
</style>
