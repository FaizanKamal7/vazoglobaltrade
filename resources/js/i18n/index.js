import { createI18n } from 'vue-i18n'
import en from './en.js'
import tr from './tr.js'
import id from './id.js'

const savedLocale = (() => {
    try { return localStorage.getItem('vazo_locale') || 'en' }
    catch { return 'en' }
})()

const i18n = createI18n({
    legacy: false,
    locale: savedLocale,
    fallbackLocale: 'en',
    messages: { en, tr, id },
})

export default i18n
