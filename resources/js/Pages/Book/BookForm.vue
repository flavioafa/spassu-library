<script setup>
import { useForm } from '@inertiajs/vue3'
import { onBeforeMount } from 'vue'

const props = defineProps({
	errors: Object,
	authors: Array,
	subjects: Array,
	book: Object,
})

const form = useForm({
	id: props.book?.id,
	title: props.book?.title,
	publisher: props.book?.publisher,
	price: props.book?.price,
	edition: props.book?.edition,
	publication_year: props.book?.publication_year,
	authors: props.book.authors ?? [],
	subjects: props.book.subjects ?? [],
})

const submit = () => {
	form.id ? form.put(`/livros/${form.id}`) : form.post('/livros')
}

onBeforeMount(() => {
	if (props.book) {
		form.authors = props.book.authors.map((author) => author.id)
		form.subjects = props.book.subjects.map((subject) => subject.id)
	}
})
</script>

<template>
	<form @submit.prevent="submit" class="row g-3 needs-validation">
		<div class="row">
			<div>
				<label for="title" class="form-label">Título</label>
				<div class="input-group has-validation">
					<input
						type="text"
						class="form-control"
						:class="errors.title ? 'is-invalid' : ''"
						id="title"
						v-model="form.title"
						aria-describedby="validationTitle"
					/>
					<div id="validationTitle" class="invalid-feedback">
						{{ errors.title }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div>
				<label for="authors" class="form-label">Autores</label>
				<div class="input-group">
					<select
						class="form-select"
						id="authors"
						multiple
						aria-label="Autores"
						v-model="form.authors"
					>
						<option selected>Selecione os Autores</option>
						<option
							v-for="author in authors"
							:key="author.id"
							:value="author.id"
						>
							{{ author.name }}
						</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div>
				<label for="authors" class="form-label">Assuntos</label>
				<div class="input-group">
					<select
						class="form-select"
						id="subjects"
						multiple
						aria-label="Assuntos"
						v-model="form.subjects"
					>
						<option selected>Selecione os Assuntos</option>
						<option
							v-for="subject in subjects"
							:key="subject.id"
							:value="subject.id"
						>
							{{ subject.description }}
						</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div>
				<label for="publisher" class="form-label">Editora</label>
				<div class="input-group has-validation">
					<input
						type="text"
						class="form-control"
						:class="errors.publisher ? 'is-invalid' : ''"
						id="publisher"
						v-model="form.publisher"
						aria-describedby="validationPublisher"
					/>
					<div id="validationPublisher" class="invalid-feedback">
						{{ errors.publisher }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<label for="price" class="form-label">Preço (R$)</label>
				<div class="input-group has-validation">
					<input
						type="text"
						class="form-control"
						:class="errors.price ? 'is-invalid' : ''"
						id="price"
						v-model="form.price"
						aria-describedby="validationPrice"
					/>
					<div id="validationPrice" class="invalid-feedback">
						{{ errors.price }}
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="edition" class="form-label">Edição</label>
				<div class="input-group has-validation">
					<input
						type="number"
						class="form-control"
						:class="errors.edition ? 'is-invalid' : ''"
						id="edition"
						v-model="form.edition"
						aria-describedby="validationEdition"
					/>
					<div id="validationEdition" class="invalid-feedback">
						{{ errors.edition }}
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<label for="publication_year" class="form-label"
					>Ano da Publicação</label
				>
				<div class="input-group has-validation">
					<input
						type="number"
						class="form-control"
						:class="errors.publication_year ? 'is-invalid' : ''"
						id="publication_year"
						v-model="form.publication_year"
						aria-describedby="validationPublicationYear"
					/>
					<div id="validationPublicationYear" class="invalid-feedback">
						{{ errors.publication_year }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="mt-2">
				<button
					class="btn float-end"
					:class="form.id ? 'btn-primary' : 'btn-success'"
					type="submit"
					:disabled="form.processing"
				>
					{{ form.id ? 'Alterar' : 'Criar' }}
				</button>
				<Link
					href="/livros"
					as="button"
					type="button"
					class="btn btn-danger float-end me-2"
					>Cancelar
				</Link>
			</div>
		</div>
	</form>
</template>
