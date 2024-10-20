<script setup>
defineProps({
	authors: Object,
})
</script>

<template>
	<Head>
		<title>Autores</title>
	</Head>
	<div class="container">
		<div class="row">
			<div class="d-grid gap-4 d-md-flex">
				<div>
					<h1>Autores</h1>
				</div>
				<div class="align-middle">
					<Link
						href="/autores/criar"
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
						<th scope="col">Nome</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<tr v-for="author in authors.data" :key="author.id">
						<th scope="row">{{ author.id }}</th>
						<td>{{ author.name }}</td>
						<td>
							<Link
								:href="'/autores/' + author.id"
								class="btn btn-primary me-2"
								as="button"
								type="button"
								><i class="bi bi-eye"></i>
							</Link>
							<Link
								href="/autores/criar"
								class="btn btn-danger me-2"
								as="button"
								type="button"
								><i class="bi bi-trash"></i>
							</Link>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>
