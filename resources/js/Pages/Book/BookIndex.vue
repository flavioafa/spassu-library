<script setup>
import Pagination from '@/Shared/Pagination.vue'

defineProps({
	books: Object,
})
</script>

<template>
	<Head>
		<title>Livros</title>
	</Head>
	<div class="container">
		<div class="row">
			<div class="d-grid gap-4 d-md-flex">
				<div>
					<h1>Livros</h1>
				</div>
				<div class="align-middle">
					<Link
						href="/livros/criar"
						class="btn btn-success bi bi-plus"
						as="button"
						type="button"
					/>
				</div>
			</div>
		</div>
		<div class="row">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Título</th>
						<th scope="col">Editora</th>
						<th scope="col">Preço (R$)</th>
						<th scope="col">Edição</th>
						<th scope="col">Ano</th>
						<th class="text-center" scope="col">Ações</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<tr v-for="book in books.data" :key="book.id">
						<th scope="row">{{ book.id }}</th>
						<td>{{ book.title }}</td>
						<td>{{ book.publisher }}</td>
						<td class="text-end">{{ book.price }}</td>
						<td class="text-end">{{ book.edition }}</td>
						<td class="text-end">{{ book.publication_year }}</td>
						<td class="text-center">
							<Link
								:href="'/livros/' + book.id"
								class="btn btn-primary me-2"
								as="button"
								type="button"
								><i class="bi bi-pencil"></i>
							</Link>
							<Link
								href="/livros/criar"
								class="btn btn-danger me-2"
								as="button"
								type="button"
								><i class="bi bi-trash"></i>
							</Link>
						</td>
					</tr>
				</tbody>
			</table>
			<Pagination :pagination="books" />
		</div>
	</div>
</template>
