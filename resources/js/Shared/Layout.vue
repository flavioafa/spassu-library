<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
	<main>
		<header
			class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom"
		>
			<nav class="nav">
				<Link href="/" class="nav-link text-decoration-none">Home</Link>
				<Link href="/autores" class="nav-link">Autores</Link>
				<Link href="/livros" class="nav-link">Livros</Link>
				<Link href="/assuntos" class="nav-link">Assuntos</Link>
				<Link href="/logout" method="post" class="nav-link">Sair</Link>
			</nav>
		</header>
		<article>
			<slot />
		</article>
	</main>
</template>
