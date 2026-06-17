import { ref, watch } from 'vue'

const theme = ref(
    (() => { try { return localStorage.getItem('vazo_theme') || 'light' } catch { return 'light' } })()
)

// Apply immediately to prevent flash of wrong theme before Vue mounts
if (typeof document !== 'undefined') {
    document.documentElement.classList.toggle('light', theme.value === 'light')
}

watch(theme, (t) => {
    document.documentElement.classList.toggle('light', t === 'light')
    try { localStorage.setItem('vazo_theme', t) } catch {}
})

export function useTheme() {
    function toggle() {
        theme.value = theme.value === 'dark' ? 'light' : 'dark'
    }
    return { theme, toggle }
}
