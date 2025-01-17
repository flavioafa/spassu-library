import './bootstrap'
import 'bootstrap' //Import do bootstrap library
import 'bootstrap-icons/font/bootstrap-icons.css' //Import do bootstrap icons

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
	id: 'app',
	title: (title) => `${title} - Library`,
	resolve: (name) => {
		const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
		let page = pages[`./Pages/${name}.vue`]
		if (page.default.layout === undefined) {
			page.default.layout = Layout
		}
		return page
	},
	setup({ el, App, props, plugin }) {
		createApp({ render: () => h(App, props) })
			.use(plugin)
			.component('Link', Link)
			.component('Head', Head)
			.mount(el)
	},
	progress: {
		// The delay after which the progress bar will appear, in milliseconds...
		delay: 250,

		// The color of the progress bar...
		color: '#29d',

		// Whether to include the default NProgress styles...
		includeCSS: true,

		// Whether the NProgress spinner will be shown...
		showSpinner: true,
	},
})
