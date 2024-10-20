<script setup>
import Pagination from '@/Shared/Pagination.vue'

defineProps({
	subjects: Object,
})
</script>

<template>
	<Head>
		<title>Assuntos</title>
	</Head>
	<div class="container">
		<div class="row">
			<div class="d-grid gap-4 d-md-flex">
				<div>
					<h1>Assuntos</h1>
				</div>
				<div class="align-middle">
					<Link
						href="/assuntos/criar"
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
						<th scope="col">Descrição</th>
						<th class="text-center" scope="col">Ações</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<tr v-for="subject in subjects.data" :key="subject.id">
						<th scope="row">{{ subject.id }}</th>
						<td>{{ subject.description }}</td>
						<td class="text-center">
							<Link
								:href="'/assuntos/' + subject.id"
								class="btn btn-primary me-2"
								as="button"
								type="button"
								><i class="bi bi-pencil"></i>
							</Link>
							<Link
								:href="'/assuntos/' + subject.id"
								class="btn btn-danger me-2"
								as="button"
								type="button"
								method="delete"
								><i class="bi bi-trash"></i>
							</Link>
						</td>
					</tr>
				</tbody>
			</table>
			<Pagination :pagination="subjects" />
		</div>
	</div>
</template>
