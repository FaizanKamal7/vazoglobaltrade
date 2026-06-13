<template>
    <section id="contact" class="relative bg-vazo-dark-2 py-24 md:py-32 overflow-hidden">

        <!-- Top wave -->
        <div class="absolute top-0 left-0 right-0">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="w-full block" height="56">
                <path d="M0,28 C480,0 960,56 1440,28 L1440,0 L0,0 Z" style="fill: var(--color-vazo-dark)"/>
            </svg>
        </div>

        <!-- Background glow -->
        <div class="absolute inset-0 pointer-events-none"
             style="background: radial-gradient(ellipse 70% 60% at 50% 60%, rgba(201,168,76,0.04) 0%, transparent 70%)"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8 pt-6">

            <!-- Header -->
            <div ref="headerEl" class="section-fade text-center mb-14">
                <p class="text-vazo-gold text-xs font-medium tracking-[0.25em] uppercase mb-4">
                    Get In Touch
                </p>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-vazo-cream font-semibold mb-4 gold-underline gold-underline-center">
                    {{ t('contact.title') }}
                </h2>
                <div class="h-px w-16 bg-vazo-gold/40 mx-auto mt-6 mb-6"></div>
                <p class="text-vazo-muted-2 text-base max-w-xl mx-auto">
                    {{ t('contact.subtitle') }}
                </p>
            </div>

            <div class="grid lg:grid-cols-5 gap-10 lg:gap-14">

                <!-- Left: form -->
                <div ref="formEl" class="section-fade lg:col-span-3">
                    <form @submit.prevent="submitForm" class="space-y-5">

                        <!-- Name + Company -->
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                    {{ t('contact.form.fullName') }} *
                                </label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    class="form-input"
                                    :placeholder="t('contact.form.fullName')"
                                    required
                                />
                            </div>
                            <div>
                                <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                    {{ t('contact.form.company') }}
                                </label>
                                <input
                                    v-model="form.company"
                                    type="text"
                                    class="form-input"
                                    :placeholder="t('contact.form.company')"
                                />
                            </div>
                        </div>

                        <!-- Email + Phone -->
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                    {{ t('contact.form.email') }} *
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    class="form-input"
                                    :placeholder="t('contact.form.email')"
                                    required
                                />
                            </div>
                            <div>
                                <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                    {{ t('contact.form.phone') }}
                                </label>
                                <input
                                    v-model="form.phone"
                                    type="tel"
                                    class="form-input"
                                    :placeholder="t('contact.form.phone')"
                                />
                            </div>
                        </div>

                        <!-- Product interest -->
                        <div>
                            <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                {{ t('contact.form.product') }}
                            </label>
                            <select v-model="form.product" class="form-input">
                                <option value="">{{ t('contact.form.selectProduct') }}</option>
                                <option value="all">{{ t('contact.form.allProducts') }}</option>
                                <option v-for="p in productOptions" :key="p.value" :value="p.value">
                                    {{ p.label }}
                                </option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-vazo-muted-2 text-xs font-medium tracking-wide uppercase mb-2">
                                {{ t('contact.form.message') }} *
                            </label>
                            <textarea
                                v-model="form.message"
                                class="form-input resize-none"
                                rows="5"
                                :placeholder="t('contact.form.message')"
                                required
                            ></textarea>
                        </div>

                        <!-- Status messages -->
                        <Transition name="fade">
                            <div
                                v-if="status"
                                class="rounded-lg px-4 py-3 text-sm border"
                                :class="
                                    status === 'success'
                                        ? 'bg-green-900/20 border-green-700/30 text-green-300'
                                        : 'bg-red-900/20 border-red-700/30 text-red-300'
                                "
                            >
                                {{ status === 'success' ? t('contact.form.success') : t('contact.form.error') }}
                            </div>
                        </Transition>

                        <!-- Submit buttons -->
                        <div class="flex flex-wrap gap-4 pt-1">
                            <button
                                type="submit"
                                :disabled="sending"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-vazo-gold text-vazo-dark font-semibold text-sm tracking-wide rounded hover:bg-vazo-gold-light transition-all duration-300 disabled:opacity-60 disabled:cursor-not-allowed shadow-lg shadow-vazo-gold/20"
                            >
                                <svg v-if="sending" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                </svg>
                                {{ sending ? t('contact.form.sending') : t('contact.form.send') }}
                            </button>

                            <a
                                :href="`https://wa.me/905513620343?text=${encodeURIComponent('Hello, I am interested in Indonesian spices from Vazo Global Trade.')}`"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3.5 border border-green-600/50 text-green-400 font-medium text-sm tracking-wide rounded hover:bg-green-900/20 hover:border-green-500 transition-all duration-300"
                            >
                                <!-- WhatsApp icon -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                {{ t('contact.form.whatsapp') }}
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Right: info panel -->
                <div ref="infoEl" class="section-fade lg:col-span-2 space-y-5" style="transition-delay:0.15s">

                    <!-- Direct contact -->
                    <div class="bg-vazo-card border border-vazo-border rounded-xl p-6">
                        <p class="text-vazo-gold text-xs font-medium tracking-[0.2em] uppercase mb-5">Direct Contact</p>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-lg bg-vazo-gold/10 border border-vazo-gold/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-vazo-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-vazo-muted text-xs uppercase tracking-wide mb-0.5">Email</p>
                                    <a href="mailto:vazoglobaltrade@gmail.com" class="text-vazo-cream text-sm font-medium hover:text-vazo-gold transition-colors">vazoglobaltrade@gmail.com</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-lg bg-green-900/20 border border-green-700/25 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-vazo-muted text-xs uppercase tracking-wide mb-0.5">WhatsApp</p>
                                    <a href="https://wa.me/905513620343" target="_blank" rel="noopener noreferrer" class="text-vazo-cream text-sm font-medium hover:text-green-400 transition-colors">+90 551 362 03 43 (Sherly)</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- What to expect -->
                    <div class="bg-vazo-card border border-vazo-border rounded-xl p-6">
                        <p class="text-vazo-gold text-xs font-medium tracking-[0.2em] uppercase mb-4">What to Expect</p>
                        <ul class="space-y-3">
                            <li v-for="item in expectations" :key="item" class="flex items-start gap-2.5 text-vazo-muted text-sm">
                                <svg class="w-4 h-4 text-vazo-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ item }}
                            </li>
                        </ul>
                    </div>

                    <!-- Regions -->
                    <div class="bg-vazo-card border border-vazo-border rounded-xl p-6">
                        <p class="text-vazo-gold text-xs font-medium tracking-[0.2em] uppercase mb-3">Trade Route</p>
                        <div class="flex items-center gap-3">
                            <span class="text-vazo-cream text-sm font-medium">🇮🇩 Indonesia</span>
                            <div class="flex-1 h-px bg-gradient-to-r from-vazo-gold/50 via-vazo-gold/30 to-vazo-gold/50"></div>
                            <span class="text-vazo-cream text-sm font-medium">🇹🇷 Turkey</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'
import axios from 'axios'

const { t } = useI18n()

const headerEl = ref(null)
const formEl   = ref(null)
const infoEl   = ref(null)

const sending = ref(false)
const status  = ref(null)

const form = ref({
    name:    '',
    company: '',
    email:   '',
    phone:   '',
    product: '',
    message: '',
})

const productKeys = ['blackPepper', 'whitePepper', 'cloves', 'cinnamon', 'nutmeg', 'turmeric', 'ginger', 'cardamom']

const productOptions = computed(() =>
    productKeys.map(k => ({ value: k, label: t(`products.items.${k}.name`) }))
)

const expectations = [
    'Response within 24 business hours',
    'No-obligation initial consultation',
    'Custom pricing based on your volume',
    'Full documentation and compliance support',
]

async function submitForm() {
    sending.value = true
    status.value  = null
    try {
        await axios.post('/api/contact', form.value)
        status.value = 'success'
        form.value = { name: '', company: '', email: '', phone: '', product: '', message: '' }
    } catch {
        status.value = 'error'
    } finally {
        sending.value = false
    }
}

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible')
        }),
        { threshold: 0.1 }
    )
    ;[headerEl.value, formEl.value, infoEl.value].forEach(el => el && observer.observe(el))
})
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 0.3s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
