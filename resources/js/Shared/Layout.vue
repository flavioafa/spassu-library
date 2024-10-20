<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
	<main>
		<header
			class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom"
		>
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<Link
									href="/"
									class="nav-link"
									:class="{ active: $page.url === '/' }"
									>Home
								</Link>
							</li>
							<li class="nav-item">
								<Link
									href="/livros"
									class="nav-link"
									:class="{ active: $page.url === '/livros' }"
								>
									Livros
								</Link>
							</li>
							<li class="nav-item">
								<Link
									href="/autores"
									class="nav-link"
									:class="{ active: $page.url === '/autores' }"
								>
									Autores
								</Link>
							</li>
							<li class="nav-item">
								<Link
									href="/assuntos"
									class="nav-link"
									:class="{ active: $page.url === '/assuntos' }"
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
					</div>
				</div>
			</nav>
		</header>
		<article>
			<slot />
		</article>
	</main>
</template>
