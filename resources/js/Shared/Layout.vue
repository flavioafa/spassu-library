<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
	<main>
		<header>
			<ul class="nav nav-underline justify-content-end">
				<li class="nav-item">
					<Link
						href="/"
						:class="{ 'nav-link': true, active: $page.url === '/' }"
						>Home
					</Link>
				</li>
				<li class="nav-item">
					<Link
						href="/livros"
						:class="{ 'nav-link': true, active: $page.url === '/livros' }"
					>
						Livros
					</Link>
				</li>
				<li class="nav-item">
					<Link
						href="/autores"
						:class="{ 'nav-link': true, active: $page.url === '/autores' }"
					>
						Autores
					</Link>
				</li>
				<li class="nav-item">
					<Link
						href="/assuntos"
						:class="{ 'nav-link': true, active: $page.url === '/assuntos' }"
					>
						Assuntos
					</Link>
				</li>
				<li class="nav-item">
					<Link
						href="/logout"
						method="post"
						class="nav-link"
						as="button"
						type="button"
						>Sair
					</Link>
				</li>
			</ul>
		</header>
		<article>
			<slot />
		</article>
	</main>
</template>

<style>
.nav-link:hover {
	color: #0056b3;
	text-decoration: underline;
	background-color: #e4f4bc;
}
</style>
