<template>
    <div id="vazo-app" class="bg-vazo-dark min-h-screen">
        <Navbar />

        <main>
            <HeroSection />
            <AboutSection />
            <ProductsSection />
            <BusinessPotentialSection />
            <WhyChooseUsSection />
            <ProcessSection />
            <MarketsSection />
            <ContactSection />
        </main>

        <AppFooter />

        <!-- Scroll-to-top button -->
        <Transition name="scroll-top">
            <button
                v-if="showScrollTop"
                @click="scrollToTop"
                class="fixed bottom-6 right-6 z-40 w-11 h-11 rounded-full bg-vazo-gold text-vazo-dark flex items-center justify-center shadow-lg shadow-vazo-gold/30 hover:bg-vazo-gold-light transition-all duration-300"
                aria-label="Scroll to top"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
                </svg>
            </button>
        </Transition>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

import Navbar                   from './Navbar.vue'
import HeroSection              from './HeroSection.vue'
import AboutSection             from './AboutSection.vue'
import ProductsSection          from './ProductsSection.vue'
import BusinessPotentialSection from './BusinessPotentialSection.vue'
import WhyChooseUsSection       from './WhyChooseUsSection.vue'
import ProcessSection           from './ProcessSection.vue'
import MarketsSection           from './MarketsSection.vue'
import ContactSection           from './ContactSection.vue'
import AppFooter                from './AppFooter.vue'

const showScrollTop = ref(false)

function onScroll() {
    showScrollTop.value = window.scrollY > 400
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

onMounted(() => window.addEventListener('scroll', onScroll, { passive: true }))
onBeforeUnmount(() => window.removeEventListener('scroll', onScroll))
</script>

<style scoped>
.scroll-top-enter-active,
.scroll-top-leave-active {
    transition: opacity 0.3s ease, transform 0.3s ease;
}
.scroll-top-enter-from,
.scroll-top-leave-to {
    opacity: 0;
    transform: translateY(12px);
}
</style>
