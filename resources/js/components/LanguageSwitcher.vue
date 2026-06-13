<template>
    <div class="flex items-center gap-1">
        <button
            v-for="lang in langs"
            :key="lang.code"
            @click="setLang(lang.code)"
            class="px-2 py-1 text-xs font-medium tracking-wider uppercase transition-colors duration-200 rounded"
            :class="
                locale === lang.code
                    ? 'text-vazo-gold border border-vazo-gold/50 bg-vazo-gold/10'
                    : 'text-vazo-muted-2 hover:text-vazo-cream border border-transparent'
            "
        >
            {{ lang.label }}
        </button>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n'

const { locale } = useI18n()

const langs = [
    { code: 'en', label: 'EN' },
    { code: 'tr', label: 'TR' },
    { code: 'id', label: 'ID' },
]

function setLang(code) {
    locale.value = code
    try { localStorage.setItem('vazo_locale', code) } catch {}
}
</script>
