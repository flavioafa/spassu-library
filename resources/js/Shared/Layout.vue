<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
	<main>
		<header>
			<Link href="/">Home</Link>
			<Link href="/Author">Autores</Link>
			<Link href="/Book">Livros</Link>
			<Link href="/Subject">Assuntos</Link>
			<Link href="/logout" method="post">Sair</Link>
		</header>
		<article>
			<slot />
		</article>
	</main>
</template>
